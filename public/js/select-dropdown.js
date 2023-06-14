(function () {
    var Autocomplete = function (opts) {
        if (!("CSS" in window) || !CSS.supports("color", "var(--color-var)"))
            return;
        this.options = extendProps(Autocomplete.defaults, opts);
        this.element = this.options.element;
        this.input = this.element.getElementsByClassName(
            "js-autocomplete__input"
        )[0];
        this.results = this.element.getElementsByClassName(
            "js-autocomplete__results"
        )[0];
        this.resultsList = this.results.getElementsByClassName(
            "js-autocomplete__list"
        )[0];
        this.ariaResult = this.element.getElementsByClassName(
            "js-autocomplete__aria-results"
        );
        this.resultClassName =
            this.element.getElementsByClassName("js-autocomplete__item")
                .length > 0
                ? "js-autocomplete__item"
                : "js-autocomplete__result";
        // store search info
        this.inputVal = "";
        this.typeId = false;
        this.searching = false;
        this.searchingClass =
            this.element.getAttribute("data-autocomplete-searching-class") ||
            "autocomplete--searching";
        // dropdown reveal class
        this.dropdownActiveClass =
            this.element.getAttribute(
                "data-autocomplete-dropdown-visible-class"
            ) || this.element.getAttribute("data-dropdown-active-class");
        // truncate dropdown
        this.truncateDropdown =
            this.element.getAttribute("data-autocomplete-dropdown-truncate") &&
            this.element.getAttribute("data-autocomplete-dropdown-truncate") ==
                "on"
                ? true
                : false;
        initAutocomplete(this);
        this.autocompleteClosed = false; // fix issue when selecting an option from the list
    };

    function initAutocomplete(element) {
        initAutocompleteAria(element); // set aria attributes for SR and keyboard users
        initAutocompleteTemplates(element);
        initAutocompleteEvents(element);
    }

    function initAutocompleteAria(element) {
        // set aria attributes for input element
        element.input.setAttribute("role", "combobox");
        element.input.setAttribute("aria-autocomplete", "list");
        var listId = element.resultsList.getAttribute("id");
        if (listId) element.input.setAttribute("aria-owns", listId);
        // set aria attributes for autocomplete list
        element.resultsList.setAttribute("role", "list");
    }

    function initAutocompleteTemplates(element) {
        element.templateItems = element.resultsList.querySelectorAll(
            "." + element.resultClassName + "[data-autocomplete-template]"
        );
        if (element.templateItems.length < 1)
            element.templateItems = element.resultsList.querySelectorAll(
                "." + element.resultClassName
            );
        element.templates = [];
        for (var i = 0; i < element.templateItems.length; i++) {
            element.templates[i] = element.templateItems[i].getAttribute(
                "data-autocomplete-template"
            );
        }
    }

    function initAutocompleteEvents(element) {
        // input - keyboard navigation
        element.input.addEventListener("keyup", function (event) {
            handleInputTyped(element, event);
        });

        // if input type="search" -> detect when clicking on 'x' to clear input
        element.input.addEventListener("search", function (event) {
            updateSearch(element);
        });

        // make sure dropdown is open on click
        element.input.addEventListener("click", function (event) {
            updateSearch(element, true);
        });

        element.input.addEventListener("focus", function (event) {
            if (element.autocompleteClosed) {
                element.autocompleteClosed = false;
                return;
            }
            updateSearch(element, true);
        });

        // input loses focus -> close menu
        element.input.addEventListener("blur", function (event) {
            checkFocusLost(element, event);
        });

        // results list - keyboard navigation
        element.resultsList.addEventListener("keydown", function (event) {
            navigateList(element, event);
        });

        // results list loses focus -> close menu
        element.resultsList.addEventListener("focusout", function (event) {
            checkFocusLost(element, event);
        });

        // close on esc
        window.addEventListener("keyup", function (event) {
            if (
                (event.keyCode && event.keyCode == 27) ||
                (event.key && event.key.toLowerCase() == "escape")
            ) {
                toggleOptionsList(element, false);
            } else if (
                (event.keyCode && event.keyCode == 13) ||
                (event.key && event.key.toLowerCase() == "enter")
            ) {
                // on Enter - select result if focus is within results list
                selectResult(
                    element,
                    document.activeElement.closest(
                        "." + element.resultClassName
                    ),
                    event
                );
            }
        });

        // select element from list
        element.resultsList.addEventListener("click", function (event) {
            selectResult(
                element,
                event.target.closest("." + element.resultClassName),
                event
            );
        });
    }

    function checkFocusLost(element, event) {
        if (element.element.contains(event.relatedTarget)) return;
        toggleOptionsList(element, false);
    }

    function handleInputTyped(element, event) {
        if (event.key.toLowerCase() == "arrowdown" || event.keyCode == "40") {
            moveFocusToList(element);
        } else {
            updateSearch(element);
        }
    }

    function moveFocusToList(element) {
        if (!element.element.classList.contains(element.dropdownActiveClass))
            return;
        resetSearch(element); // clearTimeout
        // make sure first element is focusable
        var index = 0;
        if (!elementListIsFocusable(element.resultsItems[index])) {
            index = getElementFocusbleIndex(element, index, true);
        }
        getListFocusableEl(element.resultsItems[index]).focus();
    }

    function updateSearch(element, bool) {
        var inputValue = element.input.value;
        if (inputValue == element.inputVal && !bool) return; // input value did not change
        element.inputVal = inputValue;
        if (element.typeId) clearInterval(element.typeId); // clearTimeout
        if (element.inputVal.length < element.options.characters) {
            // not enough characters to start searching
            toggleOptionsList(element, false);
            return;
        }
        if (bool) {
            // on focus -> update result list without waiting for the debounce
            updateResultsList(element, "focus");
            return;
        }
        element.typeId = setTimeout(function () {
            updateResultsList(element, "type");
        }, element.options.debounce);
    }

    function toggleOptionsList(element, bool) {
        // toggle visibility of options list
        if (bool) {
            if (element.element.classList.contains(element.dropdownActiveClass))
                return;
            element.element.classList.add(element.dropdownActiveClass);
            element.input.setAttribute("aria-expanded", true);
            truncateAutocompleteList(element);
        } else {
            if (
                !element.element.classList.contains(element.dropdownActiveClass)
            )
                return;
            if (element.resultsList.contains(document.activeElement)) {
                element.autocompleteClosed = true;
                element.input.focus();
            }
            element.element.classList.remove(element.dropdownActiveClass);
            element.input.removeAttribute("aria-expanded");
            resetSearch(element); // clearTimeout
        }
    }

    function truncateAutocompleteList(element) {
        if (!element.truncateDropdown) return;
        // reset max height
        element.resultsList.style.maxHeight = "";
        // check available space
        var spaceBelow =
                window.innerHeight -
                element.input.getBoundingClientRect().bottom -
                10,
            maxHeight = parseInt(
                getComputedStyle(element.resultsList).maxHeight
            );

        maxHeight > spaceBelow
            ? (element.resultsList.style.maxHeight = spaceBelow + "px")
            : (element.resultsList.style.maxHeight = "");
    }

    function updateResultsList(element, eventType) {
        if (element.searching) return;
        element.searching = true;
        element.element.classList.add(element.searchingClass); // show loader
        element.options.searchData(
            element.inputVal,
            function (data, cb) {
                // data = custom results
                populateResults(element, data, cb);
                element.element.classList.remove(element.searchingClass);
                toggleOptionsList(element, true);
                updateAriaRegion(element);
                element.searching = false;
            },
            eventType
        );
    }

    function updateAriaRegion(element) {
        element.resultsItems = element.resultsList.querySelectorAll(
            "." + element.resultClassName + '[tabindex="-1"]'
        );
        if (element.ariaResult.length == 0) return;
        element.ariaResult[0].textContent = element.resultsItems.length;
    }

    function resetSearch(element) {
        if (element.typeId) clearInterval(element.typeId);
        element.typeId = false;
    }

    function navigateList(element, event) {
        var downArrow =
                event.key.toLowerCase() == "arrowdown" || event.keyCode == "40",
            upArrow =
                event.key.toLowerCase() == "arrowup" || event.keyCode == "38";
        if (!downArrow && !upArrow) return;
        event.preventDefault();
        var selectedElement =
            document.activeElement.closest("." + element.resultClassName) ||
            document.activeElement;
        var index = Array.prototype.indexOf.call(
            element.resultsItems,
            selectedElement
        );
        var newIndex = getElementFocusbleIndex(element, index, downArrow);
        getListFocusableEl(element.resultsItems[newIndex]).focus();
    }

    function getElementFocusbleIndex(element, index, nextItem) {
        var newIndex = nextItem ? index + 1 : index - 1;
        if (newIndex < 0) newIndex = element.resultsItems.length - 1;
        if (newIndex >= element.resultsItems.length) newIndex = 0;
        // check if element can be focused
        if (!elementListIsFocusable(element.resultsItems[newIndex])) {
            // skip this element
            return getElementFocusbleIndex(element, newIndex, nextItem);
        }
        return newIndex;
    }

    function elementListIsFocusable(item) {
        var role = item.getAttribute("role");
        if (role && role == "presentation") {
            // skip this element
            return false;
        }
        return true;
    }

    function getListFocusableEl(item) {
        var newFocus = item,
            focusable = newFocus.querySelectorAll(
                "button:not([disabled]), [href]"
            );
        if (focusable.length > 0) newFocus = focusable[0];
        return newFocus;
    }

    function selectResult(element, result, event) {
        if (!result) return;
        if (element.options.onClick) {
            element.options.onClick(result, element, event, function () {
                toggleOptionsList(element, false);
            });
        } else {
            element.input.value = getResultContent(result);
            toggleOptionsList(element, false);
        }
        element.inputVal = element.input.value;
    }

    function getResultContent(result) {
        // get text content of selected item
        var labelElement = result.querySelector("[data-autocomplete-label]");
        return labelElement ? labelElement.textContent : result.textContent;
    }

    function populateResults(element, data, cb) {
        var innerHtml = "";

        for (var i = 0; i < data.length; i++) {
            innerHtml = innerHtml + getItemHtml(element, data[i]);
        }
        if (element.options.populate) element.resultsList.innerHTML = innerHtml;
        else if (cb) cb(innerHtml);
    }

    function getItemHtml(element, data) {
        var clone = getClone(element, data);
        clone.classList.remove("is-hidden");
        clone.setAttribute("tabindex", "-1");
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                if (key == "label") setLabel(clone, data[key]);
                else if (key == "class") setClass(clone, data[key]);
                else if (key == "url") setUrl(clone, data[key]);
                else if (key == "src") setSrc(clone, data[key]);
                else setKey(clone, key, data[key]);
            }
        }
        return clone.outerHTML;
    }

    function getClone(element, data) {
        var item = false;
        if (element.templateItems.length == 1 || !data["template"])
            item = element.templateItems[0];
        else {
            for (var i = 0; i < element.templateItems.length; i++) {
                if (data["template"] == element.templates[i]) {
                    item = element.templateItems[i];
                }
            }
            if (!item) item = element.templateItems[0];
        }
        return item.cloneNode(true);
    }

    function setLabel(clone, label) {
        var labelElement = clone.querySelector("[data-autocomplete-label]");
        labelElement
            ? (labelElement.textContent = label)
            : (clone.textContent = label);
    }

    function setClass(clone, classList) {
        var classesArray = classList.split(" ");
        clone.classList.add(classesArray[0]);
        if (classesArray.length > 1)
            setClass(clone, classesArray.slice(1).join(" "));
    }

    function setUrl(clone, url) {
        var linkElement = clone.querySelector("[data-autocomplete-url]");
        if (linkElement) linkElement.setAttribute("href", url);
    }

    function setSrc(clone, src) {
        var imgElement = clone.querySelector("[data-autocomplete-src]");
        if (imgElement) imgElement.setAttribute("src", src);
    }

    function setKey(clone, key, value) {
        var subElement = clone.querySelector("[data-autocomplete-" + key + "]");
        if (subElement) {
            if (subElement.hasAttribute("data-autocomplete-html"))
                subElement.innerHTML = value;
            else subElement.textContent = value;
        }
    }

    var extendProps = function () {
        // Variables
        var extended = {};
        var deep = false;
        var i = 0;
        var length = arguments.length;

        // Check if a deep merge
        if (
            Object.prototype.toString.call(arguments[0]) === "[object Boolean]"
        ) {
            deep = arguments[0];
            i++;
        }

        // Merge the object into the extended object
        var merge = function (obj) {
            for (var prop in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                    // If deep merge and property is an object, merge properties
                    if (
                        deep &&
                        Object.prototype.toString.call(obj[prop]) ===
                            "[object Object]"
                    ) {
                        extended[prop] = extend(
                            true,
                            extended[prop],
                            obj[prop]
                        );
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        // Loop through each object and conduct a merge
        for (; i < length; i++) {
            var obj = arguments[i];
            merge(obj);
        }

        return extended;
    };

    Autocomplete.defaults = {
        element: "",
        debounce: 200,
        characters: 2,
        populate: true,
        searchData: false, // function used to return results
        onClick: false, // function executed when selecting an item in the list; arguments (result, obj) -> selected <li> item + Autocompletr obj reference
    };

    window.Autocomplete = Autocomplete;
})();

if (!Util) function Util() {}

Util.addClass = function (el, className) {
    var classList = className.split(" ");
    el.classList.add(classList[0]);
    if (classList.length > 1) Util.addClass(el, classList.slice(1).join(" "));
};

Util.addClass = function (el, className) {
    var classList = className.split(" ");
    el.classList.add(classList[0]);
    if (classList.length > 1) Util.addClass(el, classList.slice(1).join(" "));
};

Util.removeClass = function (el, className) {
    var classList = className.split(" ");
    el.classList.remove(classList[0]);
    if (classList.length > 1)
        Util.removeClass(el, classList.slice(1).join(" "));
};

Util.toggleClass = function (el, className, bool) {
    if (bool) Util.addClass(el, className);
    else Util.removeClass(el, className);
};

// File#: _3_select-autocomplete
// Usage: codyhouse.co/license
(function () {
    var SelectAuto = function (element) {
        this.element = element;
        this.input = this.element.getElementsByClassName(
            "js-autocomplete__input"
        );
        this.resetBtn = this.element.getElementsByClassName(
            "js-select-auto__input-btn"
        );
        this.select = this.element.getElementsByClassName(
            "js-select-auto__select"
        );
        this.selectedValue = false; // value of the <option> the user selected
        this.selectOptions = []; // autocomplete list extracted from the <select> element
        this.focusOutId = false; // keep track of focus status
        this.autocompleteResults = this.element.getElementsByClassName(
            "js-autocomplete__results"
        );
        initSelectAuto(this);
    };

    function initSelectAuto(element) {
        if (element.select.length == 0) return;
        initDataResults(element); // populate autocomplete list
        Util.addClass(element.select[0], "is-hidden"); // hide native <select> element
        setInitialSelection(element);
        initAutocomplete(element);
        initSelectAutoEvents(element);
    }

    function initDataResults(element) {
        // create the list of possible results based on the <select> input
        var optgroups = element.select[0].getElementsByTagName("optgroup");
        if (optgroups.length > 0) {
            var directChildren = element.select[0].children;
            for (var i = 0; i < directChildren.length; i++) {
                var childType = directChildren[i].tagName.toLowerCase();
                if (childType == "option")
                    pushOptions(element, [directChildren[i]]);
                else if (childType == "optgroup")
                    pushOptgroup(element, directChildren[i]);
            }
        } else {
            // no <optgroup>s -> loop through <options>
            pushOptions(
                element,
                element.select[0].getElementsByTagName("option")
            );
        }
    }

    function pushOptgroup(element, optgroup) {
        // push <optgroup> item
        var item = {};
        item.label = optgroup.getAttribute("label");
        item.template = "optgroup";
        item = setCustomData(item, optgroup);
        element.selectOptions.push(item);
        // now push <option>s
        pushOptions(element, optgroup.getElementsByTagName("option"));
    }

    function pushOptions(element, options) {
        for (var i = 0; i < options.length; i++) {
            pushSingleOption(element, options[i]);
        }
    }

    function pushSingleOption(element, option) {
        // do not push <option>s without a value
        if (!option.getAttribute("value")) return;
        var item = {};
        item.label = option.text;
        item.template = "option";
        item.value = option.value;
        item = setCustomData(item, option);
        element.selectOptions.push(item);
    }

    function setCustomData(obj, element) {
        // get custom data-attributes added to <option>s/<optgroup>s and add them to the autocomplete list
        var dataset = element.dataset;
        for (var prop in dataset) {
            if (Object.prototype.hasOwnProperty.call(dataset, prop)) {
                obj[prop] = dataset[prop];
            }
        }
        return obj;
    }

    function initAutocomplete(element) {
        // CodyHouse Autocomplete component
        // more info: https://codyhouse.co/ds/components/info/autocomplete
        new Autocomplete({
            element: element.element,
            characters: 0,
            searchData: function (value, cb, eventType) {
                selectAutoSearch(element, value, cb, eventType);
            },
            onClick: function (option, obj, event, cb) {
                selectAutoClick(element, option, obj, event, cb);
            },
        });
    }

    function selectAutoSearch(element, query, cb, eventType) {
        // get search results
        // more info: https://codyhouse.co/ds/components/info/autocomplete#search-data

        if (eventType == "focus") {
            // show all results when input is first in focus
            var data = JSON.parse(JSON.stringify(element.selectOptions));
        } else {
            // filter results
            var data = element.selectOptions.filter(function (item) {
                // return item if item['label'] contains 'query' or if it is an <optgroup>
                return query == "" || item["template"] == "optgroup"
                    ? true
                    : item["label"].toLowerCase().indexOf(query.toLowerCase()) >
                          -1;
            });

            // remove empty <optgroup>s
            var i = data.length;
            while (i--) {
                if (
                    data[i].template == "optgroup" &&
                    (i == data.length - 1 || data[i + 1].template == "optgroup")
                ) {
                    data.splice(i, 1);
                }
            }
        }

        // add a custom class to the selected <option> in the autocomplete list
        for (var i = 0; i < data.length; i++) {
            if (
                element.selectedValue &&
                data[i].value &&
                data[i].value == element.selectedValue &&
                data[i].template != "optgroup"
            ) {
                data[i].class = "select-auto__option--selected";
            } else if (data[i].class) {
                delete data[i].class;
            }
        }

        if (data.length == 0) {
            // fallback for no results found
            data = [
                {
                    label: "No results",
                    template: "no-results",
                },
            ];
        }

        // required by the Autocomplete component
        cb(data);
    }

    function selectAutoClick(element, option, obj, event, cb) {
        // an option in the autocomplete list has been selected
        if (option.getAttribute("data-autocomplete-template") != "option")
            return;
        // get selected value + selected label
        var value = option.querySelector("[data-autocomplete-value]").innerText;
        var label = option.querySelector("[data-autocomplete-label]").innerText;
        resetSelectAuto(element, value, label);
        cb(); // this closes the autocomplete
    }

    function initSelectAutoEvents(element) {
        // on focus out -> reset input to initial value or to '' if the option was not selected
        element.input[0].addEventListener("focusout", function (event) {
            if (element.focusOutId) clearTimeout(element.focusOutId);
            element.focusOutId = setTimeout(function () {
                if (
                    !element.element.contains(document.activeElement) ||
                    element.resetBtn[0].contains(document.activeElement)
                ) {
                    checkSelectAuto(element);
                }
            }, 100);
        });

        // when clicking on x -> reset selection to false
        if (element.resetBtn.length > 0) {
            element.resetBtn[0].addEventListener("click", function (event) {
                event.preventDefault();
                resetSelectAuto(element, false, "");
                element.input[0].focus();
            });
        }
    }

    function checkSelectAuto(element) {
        // check if we need to reset the value of the autocomplete input -> used when input loses focus
        var selectedLabel = !element.selectedValue
            ? ""
            : element.select[0].options[element.select[0].selectedIndex].text;
        if (element.input[0].value == selectedLabel) return;

        // user typed one of the possible options
        var optionInList = optionSelectedInList(element);
        if (optionInList[0]) {
            // update <select> element and return
            resetSelectAuto(element, optionInList[2], optionInList[1]);
            return;
        }

        element.input[0].value == ""
            ? resetSelectAuto(element, false, "")
            : resetSelectAuto(element, element.selectedValue, selectedLabel);
    }

    function optionSelectedInList(element) {
        var inList = false,
            label = "",
            value = false;
        for (var i = 0; i < element.selectOptions.length; i++) {
            if (
                element.selectOptions[i].template == "option" &&
                element.selectOptions[i].label.toLowerCase() ==
                    element.input[0].value.toLowerCase()
            ) {
                inList = true;
                label = element.selectOptions[i].label;
                value = element.selectOptions[i].value;
                break;
            }
        }
        return [inList, label, value];
    }

    function resetSelectAuto(element, value, label) {
        // a new <option> has been selected
        element.input[0].value = label;
        element.selectedValue = value;
        Util.toggleClass(element.element, "select-auto--selection-done", value);
        if (value === false) {
            // no value set
            element.select[0].selectedIndex = -1;
        } else {
            element.select[0].value = value;
        }
        element.select[0].dispatchEvent(new Event("change"));
    }

    function setInitialSelection(element) {
        // if an option has the 'selected' attribute -> fill the input and add the selected class in the custome dropdown
        var selectedOption =
            element.select[0].querySelector("option[selected]");
        if (selectedOption) {
            // there's an option that is already selected
            var label = selectedOption.label;
            var value = selectedOption.value;
            element.input[0].value = label;
            element.selectedValue = value;
            Util.addClass(element.element, "select-auto--selection-done");
        }
    }

    window.SelectAuto = SelectAuto;

    // init the SelectAuto object
    var selectAuto = document.getElementsByClassName("js-select-auto");
    if (selectAuto.length > 0) {
        for (var i = 0; i < selectAuto.length; i++) {
            (function (i) {
                new SelectAuto(selectAuto[i]);
            })(i);
        }
    }
})();
