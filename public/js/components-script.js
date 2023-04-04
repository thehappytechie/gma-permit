// File#: _1_alert
// Usage: codyhouse.co/license
(function() {
    var alertClose = document.getElementsByClassName('js-alert__close-btn');
    if( alertClose.length > 0 ) {
      for( var i = 0; i < alertClose.length; i++) {
        (function(i){initAlertEvent(alertClose[i]);})(i);
      }
    };
  }());

  function initAlertEvent(element) {
    element.addEventListener('click', function(event){
      event.preventDefault();
      Util.removeClass(element.closest('.js-alert'), 'alert--is-visible');
    });
  };


  // File#: _1_tooltip
// Usage: codyhouse.co/license
(function() {
    var Tooltip = function(element) {
      this.element = element;
      this.tooltip = false;
      this.tooltipIntervalId = false;
      this.tooltipContent = this.element.getAttribute('title');
      this.tooltipPosition = (this.element.getAttribute('data-tooltip-position')) ? this.element.getAttribute('data-tooltip-position') : 'top';
      this.tooltipClasses = (this.element.getAttribute('data-tooltip-class')) ? this.element.getAttribute('data-tooltip-class') : false;
      this.tooltipId = 'js-tooltip-element'; // id of the tooltip element -> trigger will have the same aria-describedby attr
      // there are cases where you only need the aria-label -> SR do not need to read the tooltip content (e.g., footnotes)
      this.tooltipDescription = (this.element.getAttribute('data-tooltip-describedby') && this.element.getAttribute('data-tooltip-describedby') == 'false') ? false : true;

      this.tooltipDelay = 300; // show tooltip after a delay (in ms)
      this.tooltipDelta = 10; // distance beetwen tooltip and trigger element (in px)
      this.tooltipTriggerHover = false;
      // tooltp sticky option
      this.tooltipSticky = (this.tooltipClasses && this.tooltipClasses.indexOf('tooltip--sticky') > -1);
      this.tooltipHover = false;
      if(this.tooltipSticky) {
        this.tooltipHoverInterval = false;
      }
      resetTooltipContent(this);
      initTooltip(this);
    };

    function resetTooltipContent(tooltip) {
      var htmlContent = tooltip.element.getAttribute('data-tooltip-title');
      if(htmlContent) {
        tooltip.tooltipContent = htmlContent;
      }
    };

    function initTooltip(tooltipObj) {
      // reset trigger element
      tooltipObj.element.removeAttribute('title');
      tooltipObj.element.setAttribute('tabindex', '0');
      // add event listeners
      tooltipObj.element.addEventListener('mouseenter', handleEvent.bind(tooltipObj));
      tooltipObj.element.addEventListener('focus', handleEvent.bind(tooltipObj));
    };

    function removeTooltipEvents(tooltipObj) {
      // remove event listeners
      tooltipObj.element.removeEventListener('mouseleave',  handleEvent.bind(tooltipObj));
      tooltipObj.element.removeEventListener('blur',  handleEvent.bind(tooltipObj));
    };

    function handleEvent(event) {
      // handle events
      switch(event.type) {
        case 'mouseenter':
        case 'focus':
          showTooltip(this, event);
          break;
        case 'mouseleave':
        case 'blur':
          checkTooltip(this);
          break;
      }
    };

    function showTooltip(tooltipObj, event) {
      // tooltip has already been triggered
      if(tooltipObj.tooltipIntervalId) return;
      tooltipObj.tooltipTriggerHover = true;
      // listen to close events
      tooltipObj.element.addEventListener('mouseleave', handleEvent.bind(tooltipObj));
      tooltipObj.element.addEventListener('blur', handleEvent.bind(tooltipObj));
      // show tooltip with a delay
      tooltipObj.tooltipIntervalId = setTimeout(function(){
        createTooltip(tooltipObj);
      }, tooltipObj.tooltipDelay);
    };

    function createTooltip(tooltipObj) {
      tooltipObj.tooltip = document.getElementById(tooltipObj.tooltipId);

      if( !tooltipObj.tooltip ) { // tooltip element does not yet exist
        tooltipObj.tooltip = document.createElement('div');
        document.body.appendChild(tooltipObj.tooltip);
      }

      // reset tooltip content/position
      Util.setAttributes(tooltipObj.tooltip, {'id': tooltipObj.tooltipId, 'class': 'tooltip tooltip--is-hidden js-tooltip', 'role': 'tooltip'});
      tooltipObj.tooltip.innerHTML = tooltipObj.tooltipContent;
      if(tooltipObj.tooltipDescription) tooltipObj.element.setAttribute('aria-describedby', tooltipObj.tooltipId);
      if(tooltipObj.tooltipClasses) Util.addClass(tooltipObj.tooltip, tooltipObj.tooltipClasses);
      if(tooltipObj.tooltipSticky) Util.addClass(tooltipObj.tooltip, 'tooltip--sticky');
      placeTooltip(tooltipObj);
      Util.removeClass(tooltipObj.tooltip, 'tooltip--is-hidden');

      // if tooltip is sticky, listen to mouse events
      if(!tooltipObj.tooltipSticky) return;
      tooltipObj.tooltip.addEventListener('mouseenter', function cb(){
        tooltipObj.tooltipHover = true;
        if(tooltipObj.tooltipHoverInterval) {
          clearInterval(tooltipObj.tooltipHoverInterval);
          tooltipObj.tooltipHoverInterval = false;
        }
        tooltipObj.tooltip.removeEventListener('mouseenter', cb);
        tooltipLeaveEvent(tooltipObj);
      });
    };

    function tooltipLeaveEvent(tooltipObj) {
      tooltipObj.tooltip.addEventListener('mouseleave', function cb(){
        tooltipObj.tooltipHover = false;
        tooltipObj.tooltip.removeEventListener('mouseleave', cb);
        hideTooltip(tooltipObj);
      });
    };

    function placeTooltip(tooltipObj) {
      // set top and left position of the tooltip according to the data-tooltip-position attr of the trigger
      var dimention = [tooltipObj.tooltip.offsetHeight, tooltipObj.tooltip.offsetWidth],
        positionTrigger = tooltipObj.element.getBoundingClientRect(),
        position = [],
        scrollY = window.scrollY || window.pageYOffset;

      position['top'] = [ (positionTrigger.top - dimention[0] - tooltipObj.tooltipDelta + scrollY), (positionTrigger.right/2 + positionTrigger.left/2 - dimention[1]/2)];
      position['bottom'] = [ (positionTrigger.bottom + tooltipObj.tooltipDelta + scrollY), (positionTrigger.right/2 + positionTrigger.left/2 - dimention[1]/2)];
      position['left'] = [(positionTrigger.top/2 + positionTrigger.bottom/2 - dimention[0]/2 + scrollY), positionTrigger.left - dimention[1] - tooltipObj.tooltipDelta];
      position['right'] = [(positionTrigger.top/2 + positionTrigger.bottom/2 - dimention[0]/2 + scrollY), positionTrigger.right + tooltipObj.tooltipDelta];

      var direction = tooltipObj.tooltipPosition;
      if( direction == 'top' && position['top'][0] < scrollY) direction = 'bottom';
      else if( direction == 'bottom' && position['bottom'][0] + tooltipObj.tooltipDelta + dimention[0] > scrollY + window.innerHeight) direction = 'top';
      else if( direction == 'left' && position['left'][1] < 0 )  direction = 'right';
      else if( direction == 'right' && position['right'][1] + dimention[1] > window.innerWidth ) direction = 'left';

      if(direction == 'top' || direction == 'bottom') {
        if(position[direction][1] < 0 ) position[direction][1] = 0;
        if(position[direction][1] + dimention[1] > window.innerWidth ) position[direction][1] = window.innerWidth - dimention[1];
      }
      tooltipObj.tooltip.style.top = position[direction][0]+'px';
      tooltipObj.tooltip.style.left = position[direction][1]+'px';
      Util.addClass(tooltipObj.tooltip, 'tooltip--'+direction);
    };

    function checkTooltip(tooltipObj) {
      tooltipObj.tooltipTriggerHover = false;
      if(!tooltipObj.tooltipSticky) hideTooltip(tooltipObj);
      else {
        if(tooltipObj.tooltipHover) return;
        if(tooltipObj.tooltipHoverInterval) return;
        tooltipObj.tooltipHoverInterval = setTimeout(function(){
          hideTooltip(tooltipObj);
          tooltipObj.tooltipHoverInterval = false;
        }, 300);
      }
    };

    function hideTooltip(tooltipObj) {
      if(tooltipObj.tooltipHover || tooltipObj.tooltipTriggerHover) return;
      clearInterval(tooltipObj.tooltipIntervalId);
      if(tooltipObj.tooltipHoverInterval) {
        clearInterval(tooltipObj.tooltipHoverInterval);
        tooltipObj.tooltipHoverInterval = false;
      }
      tooltipObj.tooltipIntervalId = false;
      if(!tooltipObj.tooltip) return;
      // hide tooltip
      removeTooltip(tooltipObj);
      // remove events
      removeTooltipEvents(tooltipObj);
    };

    function removeTooltip(tooltipObj) {
      if(tooltipObj.tooltipContent == tooltipObj.tooltip.innerHTML) {
        Util.addClass(tooltipObj.tooltip, 'tooltip--is-hidden');
      }
      if(tooltipObj.tooltipDescription) tooltipObj.element.removeAttribute('aria-describedby');
    };

    window.Tooltip = Tooltip;

    //initialize the Tooltip objects
    var tooltips = document.getElementsByClassName('js-tooltip-trigger');
    if( tooltips.length > 0 ) {
      for( var i = 0; i < tooltips.length; i++) {
        (function(i){new Tooltip(tooltips[i]);})(i);
      }
    }
  }());

  // File#: _1_tabs
// Usage: codyhouse.co/license
(function() {
    var Tab = function(element) {
      this.element = element;
      this.tabList = this.element.getElementsByClassName('js-tabs__controls')[0];
      this.listItems = this.tabList.getElementsByTagName('li');
      this.triggers = this.tabList.getElementsByTagName('a');
      this.panelsList = this.element.getElementsByClassName('js-tabs__panels')[0];
      this.panels = Util.getChildrenByClassName(this.panelsList, 'js-tabs__panel');
      this.hideClass = 'is-hidden';
      this.customShowClass = this.element.getAttribute('data-show-panel-class') ? this.element.getAttribute('data-show-panel-class') : false;
      this.layout = this.element.getAttribute('data-tabs-layout') ? this.element.getAttribute('data-tabs-layout') : 'horizontal';
      // deep linking options
      this.deepLinkOn = this.element.getAttribute('data-deep-link') == 'on';
      // init tabs
      this.initTab();
    };

    Tab.prototype.initTab = function() {
      //set initial aria attributes
      this.tabList.setAttribute('role', 'tablist');
      for( var i = 0; i < this.triggers.length; i++) {
        var bool = (i == 0),
          panelId = this.panels[i].getAttribute('id');
        this.listItems[i].setAttribute('role', 'presentation');
        Util.setAttributes(this.triggers[i], {'role': 'tab', 'aria-selected': bool, 'aria-controls': panelId, 'id': 'tab-'+panelId});
        Util.addClass(this.triggers[i], 'js-tabs__trigger');
        Util.setAttributes(this.panels[i], {'role': 'tabpanel', 'aria-labelledby': 'tab-'+panelId});
        Util.toggleClass(this.panels[i], this.hideClass, !bool);

        if(!bool) this.triggers[i].setAttribute('tabindex', '-1');
      }

      //listen for Tab events
      this.initTabEvents();

      // check deep linking option
      this.initDeepLink();
    };

    Tab.prototype.initTabEvents = function() {
      var self = this;
      //click on a new tab -> select content
      this.tabList.addEventListener('click', function(event) {
        if( event.target.closest('.js-tabs__trigger') ) self.triggerTab(event.target.closest('.js-tabs__trigger'), event);
      });
      //arrow keys to navigate through tabs
      this.tabList.addEventListener('keydown', function(event) {
        ;
        if( !event.target.closest('.js-tabs__trigger') ) return;
        if( tabNavigateNext(event, self.layout) ) {
          event.preventDefault();
          self.selectNewTab('next');
        } else if( tabNavigatePrev(event, self.layout) ) {
          event.preventDefault();
          self.selectNewTab('prev');
        }
      });
    };

    Tab.prototype.selectNewTab = function(direction) {
      var selectedTab = this.tabList.querySelector('[aria-selected="true"]'),
        index = Util.getIndexInArray(this.triggers, selectedTab);
      index = (direction == 'next') ? index + 1 : index - 1;
      //make sure index is in the correct interval
      //-> from last element go to first using the right arrow, from first element go to last using the left arrow
      if(index < 0) index = this.listItems.length - 1;
      if(index >= this.listItems.length) index = 0;
      this.triggerTab(this.triggers[index]);
      this.triggers[index].focus();
    };

    Tab.prototype.triggerTab = function(tabTrigger, event) {
      var self = this;
      event && event.preventDefault();
      var index = Util.getIndexInArray(this.triggers, tabTrigger);
      //no need to do anything if tab was already selected
      if(this.triggers[index].getAttribute('aria-selected') == 'true') return;

      for( var i = 0; i < this.triggers.length; i++) {
        var bool = (i == index);
        Util.toggleClass(this.panels[i], this.hideClass, !bool);
        if(this.customShowClass) Util.toggleClass(this.panels[i], this.customShowClass, bool);
        this.triggers[i].setAttribute('aria-selected', bool);
        bool ? this.triggers[i].setAttribute('tabindex', '0') : this.triggers[i].setAttribute('tabindex', '-1');
      }

      // update url if deepLink is on
      if(this.deepLinkOn) {
        history.replaceState(null, '', '#'+tabTrigger.getAttribute('aria-controls'));
      }
    };

    Tab.prototype.initDeepLink = function() {
      if(!this.deepLinkOn) return;
      var hash = window.location.hash.substr(1);
      var self = this;
      if(!hash || hash == '') return;
      for(var i = 0; i < this.panels.length; i++) {
        if(this.panels[i].getAttribute('id') == hash) {
          this.triggerTab(this.triggers[i], false);
          setTimeout(function(){self.panels[i].scrollIntoView(true);});
          break;
        }
      };
    };

    function tabNavigateNext(event, layout) {
      if(layout == 'horizontal' && (event.keyCode && event.keyCode == 39 || event.key && event.key == 'ArrowRight')) {return true;}
      else if(layout == 'vertical' && (event.keyCode && event.keyCode == 40 || event.key && event.key == 'ArrowDown')) {return true;}
      else {return false;}
    };

    function tabNavigatePrev(event, layout) {
      if(layout == 'horizontal' && (event.keyCode && event.keyCode == 37 || event.key && event.key == 'ArrowLeft')) {return true;}
      else if(layout == 'vertical' && (event.keyCode && event.keyCode == 38 || event.key && event.key == 'ArrowUp')) {return true;}
      else {return false;}
    };

    //initialize the Tab objects
    var tabs = document.getElementsByClassName('js-tabs');
    if( tabs.length > 0 ) {
      for( var i = 0; i < tabs.length; i++) {
        (function(i){new Tab(tabs[i]);})(i);
      }
    }
  }());



(function() {
    var Dropdown = function(element) {
      this.element = element;
      this.trigger = this.element.getElementsByClassName('js-dropdown__trigger')[0];
      this.dropdown = this.element.getElementsByClassName('js-dropdown__menu')[0];
      this.triggerFocus = false;
      this.dropdownFocus = false;
      this.hideInterval = false;
      this.dropdownSubElements = this.element.getElementsByClassName('js-dropdown__sub-wrapper');
      this.prevFocus = false; // store element that was in focus before focus changed
      this.addDropdownEvents();
    };

    Dropdown.prototype.addDropdownEvents = function(){
      //place dropdown
      var self = this;
      this.placeElement();
      this.element.addEventListener('placeDropdown', function(event){
        self.placeElement();
      });
      // init dropdown
      this.initElementEvents(this.trigger, this.triggerFocus); // this is used to trigger the primary dropdown
      this.initElementEvents(this.dropdown, this.dropdownFocus); // this is used to trigger the primary dropdown
      // init sublevels
      this.initSublevels(); // if there are additional sublevels -> bind hover/focus events
    };

    Dropdown.prototype.placeElement = function() {
      var triggerPosition = this.trigger.getBoundingClientRect(),
        isRight = (window.innerWidth < triggerPosition.left + parseInt(getComputedStyle(this.dropdown).getPropertyValue('width')));

      var xPosition = isRight ? 'right: 0px; left: auto;' : 'left: 0px; right: auto;';
      this.dropdown.setAttribute('style', xPosition);
    };

    Dropdown.prototype.initElementEvents = function(element, bool) {
      var self = this;
      element.addEventListener('mouseenter', function(){
        bool = true;
        self.showDropdown();
      });
      element.addEventListener('focus', function(){
        self.showDropdown();
      });
      element.addEventListener('mouseleave', function(){
        bool = false;
        self.hideDropdown();
      });
      element.addEventListener('focusout', function(){
        self.hideDropdown();
      });
    };

    Dropdown.prototype.showDropdown = function(){
      if(this.hideInterval) clearInterval(this.hideInterval);
      this.showLevel(this.dropdown, true);
    };

    Dropdown.prototype.hideDropdown = function(){
      var self = this;
      if(this.hideInterval) clearInterval(this.hideInterval);
      this.hideInterval = setTimeout(function(){
        var dropDownFocus = document.activeElement.closest('.js-dropdown'),
          inFocus = dropDownFocus && (dropDownFocus == self.element);
        // if not in focus and not hover -> hide
        if(!self.triggerFocus && !self.dropdownFocus && !inFocus) {
          self.hideLevel(self.dropdown);
          // make sure to hide sub/dropdown
          self.hideSubLevels();
          self.prevFocus = false;
        }
      }, 300);
    };

    Dropdown.prototype.initSublevels = function(){
      var self = this;
      var dropdownMenu = this.element.getElementsByClassName('js-dropdown__menu');
      for(var i = 0; i < dropdownMenu.length; i++) {
        var listItems = dropdownMenu[i].children;
        // bind hover
        new menuAim({
          menu: dropdownMenu[i],
          activate: function(row) {
              var subList = row.getElementsByClassName('js-dropdown__menu')[0];
              if(!subList) return;
              Util.addClass(row.querySelector('a'), 'dropdown__item--hover');
              self.showLevel(subList);
          },
          deactivate: function(row) {
              var subList = row.getElementsByClassName('dropdown__menu')[0];
              if(!subList) return;
              Util.removeClass(row.querySelector('a'), 'dropdown__item--hover');
              self.hideLevel(subList);
          },
          submenuSelector: '.js-dropdown__sub-wrapper',
        });
      }
      // store focus element before change in focus
      this.element.addEventListener('keydown', function(event) {
        if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
          self.prevFocus = document.activeElement;
        }
      });
      // make sure that sublevel are visible when their items are in focus
      this.element.addEventListener('keyup', function(event) {
        if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
          // focus has been moved -> make sure the proper classes are added to subnavigation
          var focusElement = document.activeElement,
            focusElementParent = focusElement.closest('.js-dropdown__menu'),
            focusElementSibling = focusElement.nextElementSibling;

          // if item in focus is inside submenu -> make sure it is visible
          if(focusElementParent && !Util.hasClass(focusElementParent, 'dropdown__menu--is-visible')) {
            self.showLevel(focusElementParent);
          }
          // if item in focus triggers a submenu -> make sure it is visible
          if(focusElementSibling && !Util.hasClass(focusElementSibling, 'dropdown__menu--is-visible')) {
            self.showLevel(focusElementSibling);
          }

          // check previous element in focus -> hide sublevel if required
          if( !self.prevFocus) return;
          var prevFocusElementParent = self.prevFocus.closest('.js-dropdown__menu'),
            prevFocusElementSibling = self.prevFocus.nextElementSibling;

          if( !prevFocusElementParent ) return;

          // element in focus and element prev in focus are siblings
          if( focusElementParent && focusElementParent == prevFocusElementParent) {
            if(prevFocusElementSibling) self.hideLevel(prevFocusElementSibling);
            return;
          }

          // element in focus is inside submenu triggered by element prev in focus
          if( prevFocusElementSibling && focusElementParent && focusElementParent == prevFocusElementSibling) return;

          // shift tab -> element in focus triggers the submenu of the element prev in focus
          if( focusElementSibling && prevFocusElementParent && focusElementSibling == prevFocusElementParent) return;

          var focusElementParentParent = focusElementParent.parentNode.closest('.js-dropdown__menu');

          // shift tab -> element in focus is inside the dropdown triggered by a siblings of the element prev in focus
          if(focusElementParentParent && focusElementParentParent == prevFocusElementParent) {
            if(prevFocusElementSibling) self.hideLevel(prevFocusElementSibling);
            return;
          }

          if(prevFocusElementParent && Util.hasClass(prevFocusElementParent, 'dropdown__menu--is-visible')) {
            self.hideLevel(prevFocusElementParent);
          }
        }
      });
    };

    Dropdown.prototype.hideSubLevels = function(){
      var visibleSubLevels = this.dropdown.getElementsByClassName('dropdown__menu--is-visible');
      if(visibleSubLevels.length == 0) return;
      while (visibleSubLevels[0]) {
        this.hideLevel(visibleSubLevels[0]);
         }
         var hoveredItems = this.dropdown.getElementsByClassName('dropdown__item--hover');
         while (hoveredItems[0]) {
        Util.removeClass(hoveredItems[0], 'dropdown__item--hover');
         }
    };

    Dropdown.prototype.showLevel = function(level, bool){
      if(bool == undefined) {
        //check if the sublevel needs to be open to the left
        Util.removeClass(level, 'dropdown__menu--left');
        var boundingRect = level.getBoundingClientRect();
        if(window.innerWidth - boundingRect.right < 5 && boundingRect.left + window.scrollX > 2*boundingRect.width) Util.addClass(level, 'dropdown__menu--left');
      }
      Util.addClass(level, 'dropdown__menu--is-visible');
      Util.removeClass(level, 'dropdown__menu--is-hidden');
    };

    Dropdown.prototype.hideLevel = function(level){
      if(!Util.hasClass(level, 'dropdown__menu--is-visible')) return;
      Util.removeClass(level, 'dropdown__menu--is-visible');
      Util.addClass(level, 'dropdown__menu--is-hidden');

      level.addEventListener('animationend', function cb(){
        level.removeEventListener('animationend', cb);
        Util.removeClass(level, 'dropdown__menu--is-hidden dropdown__menu--left');
      });
    };

    window.Dropdown = Dropdown;

    var dropdown = document.getElementsByClassName('js-dropdown');
    if( dropdown.length > 0 ) { // init Dropdown objects
      for( var i = 0; i < dropdown.length; i++) {
        (function(i){new Dropdown(dropdown[i]);})(i);
      }
    }
  }());


// File#: _3_dashboard-navigation
// Usage: codyhouse.co/license
(function() {
    var appUi = document.getElementsByClassName('js-app-ui');
    if(appUi.length > 0) {
      var appMenuBtn = appUi[0].getElementsByClassName('js-app-ui__menu-btn');
      if(appMenuBtn.length < 1) return;
      var appExpandedClass = 'app-ui--nav-expanded';
      var firstFocusableElement = false,
        // we'll use these to store the node that needs to receive focus when the mobile menu is closed
        focusMenu = false;

      // toggle navigation on mobile
      appMenuBtn[0].addEventListener('click', function(event) {
        var openMenu = !Util.hasClass(appUi[0], appExpandedClass);
        Util.toggleClass(appUi[0], appExpandedClass, openMenu);
        appMenuBtn[0].setAttribute('aria-expanded', openMenu);
        if(openMenu) {
          firstFocusableElement = getMenuFirstFocusable();
          if(firstFocusableElement) firstFocusableElement.focus(); // move focus to first focusable element
        } else if(focusMenu) {
          focusMenu.focus();
          focusMenu = false;
        }
      });

      // listen for key events
      window.addEventListener('keyup', function(event){
        // listen for esc key
        if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) {
          // close navigation on mobile if open
          if(appMenuBtn[0].getAttribute('aria-expanded') == 'true' && isVisible(appMenuBtn[0])) {
            focusMenu = appMenuBtn[0]; // move focus to menu trigger when menu is close
            appMenuBtn[0].click();
          }
        }
        // listen for tab key
        if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) {
          // close navigation on mobile if open when nav loses focus
          if(appMenuBtn[0].getAttribute('aria-expanded') == 'true' && isVisible(appMenuBtn[0]) && !document.activeElement.closest('.js-app-ui__nav')) appMenuBtn[0].click();
        }
      });

      // listen for resize
      var resizingId = false;
      window.addEventListener('resize', function() {
        clearTimeout(resizingId);
        resizingId = setTimeout(doneResizing, 500);
      });

      function doneResizing() {
        if( !isVisible(appMenuBtn[0]) && Util.hasClass(appUi[0], appExpandedClass)) appMenuBtn[0].click();
      };

      function getMenuFirstFocusable() {
        var mobileNav = appUi[0].getElementsByClassName('js-app-ui__nav');
        if(mobileNav.length < 1) return false;
        var focusableEle = mobileNav[0].querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"]), [controls], summary'),
          firstFocusable = false;
        for(var i = 0; i < focusableEle.length; i++) {
          if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
            firstFocusable = focusableEle[i];
            break;
          }
        }

        return firstFocusable;
      };

      function isVisible(element) {
        return (element.offsetWidth || element.offsetHeight || element.getClientRects().length);
      };
    }
  }());
  // File#: _3_interactive-table
  // Usage: codyhouse.co/license
  (function() {
    var IntTable = function(element) {
      this.element = element;
      this.header = this.element.getElementsByClassName('js-int-table__header')[0];
      this.headerCols = this.header.getElementsByTagName('tr')[0].children;
      this.body = this.element.getElementsByClassName('js-int-table__body')[0];
      this.sortingRows = this.element.getElementsByClassName('js-int-table__sort-row');
      initIntTable(this);
    };

    function initIntTable(table) {
      // check if table has actions
      initIntTableActions(table);
      // check if there are checkboxes to select/deselect a row/all rows
      var selectAll = table.element.getElementsByClassName('js-int-table__select-all');
      if(selectAll.length > 0) initIntTableSelection(table, selectAll);
      // check if there are sortable columns
      table.sortableCols = table.element.getElementsByClassName('js-int-table__cell--sort');
      if(table.sortableCols.length > 0) {
        // add a data-order attribute to all rows so that we can reset the order
        setDataRowOrder(table);
        // listen to the click event on a sortable column
        table.header.addEventListener('click', function(event){
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol || event.target.tagName.toLowerCase() == 'input') return;
          sortColumns(table, selectedCol);
        });
        table.header.addEventListener('change', function(event){ // detect change in selected checkbox (SR only)
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol) return;
          sortColumns(table, selectedCol, event.target.value);
        });
        table.header.addEventListener('keydown', function(event){ // keyboard navigation - change sorting on enter
          if( event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
            var selectedCol = event.target.closest('.js-int-table__cell--sort');
            if(!selectedCol) return;
            sortColumns(table, selectedCol);
          }
        });

        // change cell style when in focus
        table.header.addEventListener('focusin', function(event){
          var closestCell = document.activeElement.closest('.js-int-table__cell--sort');
          if(closestCell) Util.addClass(closestCell, 'int-table__cell--focus');
        });
        table.header.addEventListener('focusout', function(event){
          for(var i = 0; i < table.sortableCols.length; i++) {
            Util.removeClass(table.sortableCols[i], 'int-table__cell--focus');
          }
        });
      }
    };

    function initIntTableActions(table) {
      // check if table has actions and store them
      var tableId = table.element.getAttribute('id');
      if(!tableId) return;
      var tableActions = document.querySelector('[data-table-controls="'+tableId+'"]');
      if(!tableActions) return;
      table.actionsSelection = tableActions.getElementsByClassName('js-int-table-actions__items-selected');
      table.actionsNoSelection = tableActions.getElementsByClassName('js-int-table-actions__no-items-selected');
    };

    function initIntTableSelection(table, select) { // checkboxes for rows selection
      table.selectAll = select[0];
      table.selectRow = table.element.getElementsByClassName('js-int-table__select-row');
      // select/deselect all rows
      table.selectAll.addEventListener('click', function(event){ // we cannot use the 'change' event as on IE/Edge the change from "indeterminate" to either "checked" or "unchecked"  does not trigger that event
        toggleRowSelection(table);
      });
      // select/deselect single row - reset all row selector
      table.body.addEventListener('change', function(event){
        if(!event.target.closest('.js-int-table__select-row')) return;
        toggleAllSelection(table);
      });
      // toggle actions
      toggleActions(table, table.element.getElementsByClassName('int-table__row--checked').length > 0);
    };

    function toggleRowSelection(table) { // 'Select All Rows' checkbox has been selected/deselected
      var status = table.selectAll.checked;
      for(var i = 0; i < table.selectRow.length; i++) {
        table.selectRow[i].checked = status;
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', status);
      }
      toggleActions(table, status);
    };

    function toggleAllSelection(table) { // Single row has been selected/deselected
      var allChecked = true,
        oneChecked = false;
      for(var i = 0; i < table.selectRow.length; i++) {
        if(!table.selectRow[i].checked) {allChecked = false;}
        else {oneChecked = true;}
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', table.selectRow[i].checked);
      }
      table.selectAll.checked = oneChecked;
      // if status if false but one input is checked -> set an indeterminate state for the 'Select All' checkbox
      if(!allChecked) table.selectAll.indeterminate = oneChecked;
      toggleActions(table, oneChecked);
    };

    function setDataRowOrder(table) { // add a data-order to rows element - will be used when resetting the sorting
      var rowsArray = table.body.getElementsByTagName('tr');
      for(var i = 0; i < rowsArray.length; i++) {
        rowsArray[i].setAttribute('data-order', i);
      }
    };

    function sortColumns(table, selectedCol, customOrder) {
      // determine sorting order (asc/desc/reset)
      var order = customOrder || getSortingOrder(selectedCol),
        colIndex = Util.getIndexInArray(table.headerCols, selectedCol);
      // sort table
      sortTableContent(table, order, colIndex, selectedCol);

      // reset appearance of the th column that was previously sorted (if any)
      for(var i = 0; i < table.headerCols.length; i++) {
        Util.removeClass(table.headerCols[i], 'int-table__cell--asc int-table__cell--desc');
      }
      // reset appearance for the selected th column
      if(order == 'asc') Util.addClass(selectedCol, 'int-table__cell--asc');
      if(order == 'desc') Util.addClass(selectedCol, 'int-table__cell--desc');
      // reset checkbox selection
      if(!customOrder) selectedCol.querySelector('input[value="'+order+'"]').checked = true;
    };

    function getSortingOrder(selectedCol) { // determine sorting order
      if( Util.hasClass(selectedCol, 'int-table__cell--asc') ) return 'desc';
      if( Util.hasClass(selectedCol, 'int-table__cell--desc') ) return 'none';
      return 'asc';
    };

    function sortTableContent(table, order, index, selctedCol) { // determine the new order of the rows
      var rowsArray = table.body.getElementsByTagName('tr'),
        switching = true,
        i = 0,
        shouldSwitch;
      while (switching) {
        switching = false;
        for (i = 0; i < rowsArray.length - 1; i++) {
          var contentOne = (order == 'none') ? rowsArray[i].getAttribute('data-order') : rowsArray[i].children[index].textContent.trim(),
            contentTwo = (order == 'none') ? rowsArray[i+1].getAttribute('data-order') : rowsArray[i+1].children[index].textContent.trim();

          shouldSwitch = compareValues(contentOne, contentTwo, order, selctedCol);
          if(shouldSwitch) {
            table.body.insertBefore(rowsArray[i+1], rowsArray[i]);
            switching = true;
            break;
          }
        }
      }
    };

    function compareValues(val1, val2, order, selctedCol) {
      var compare,
        dateComparison = selctedCol.getAttribute('data-date-format');
      if( dateComparison && order != 'none') { // comparing dates
        compare =  (order == 'asc' || order == 'none') ? parseCustomDate(val1, dateComparison) > parseCustomDate(val2, dateComparison) : parseCustomDate(val2, dateComparison) > parseCustomDate(val1, dateComparison);
      } else if( !isNaN(val1) && !isNaN(val2) ) { // comparing numbers
        compare =  (order == 'asc' || order == 'none') ? Number(val1) > Number(val2) : Number(val2) > Number(val1);
      } else { // comparing strings
        compare =  (order == 'asc' || order == 'none')
          ? val2.toString().localeCompare(val1) < 0
          : val1.toString().localeCompare(val2) < 0;
      }
      return compare;
    };

    function parseCustomDate(date, format) {
      var parts = date.match(/(\d+)/g),
        i = 0, fmt = {};
      format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });

      return new Date(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]);
    };

    function toggleActions(table, selection) {
      if(table.actionsSelection && table.actionsSelection.length > 0) {
        Util.toggleClass(table.actionsSelection[0], 'is-hidden', !selection);
      }
      if(table.actionsNoSelection && table.actionsNoSelection.length > 0) {
        Util.toggleClass(table.actionsNoSelection[0], 'is-hidden', selection);
      }
    };
      var intTable = document.getElementsByClassName('js-int-table');
      if( intTable.length > 0 ) {
          for( var i = 0; i < intTable.length; i++) {
              (function(i){new IntTable(intTable[i]);})(i);
      }
    }
  }());

  // File#: _1_table
  // Usage: codyhouse.co/license
  (function() {
      function initTable(table) {
        checkTableLayour(table); // switch from a collapsed to an expanded layout
        Util.addClass(table, 'table--loaded'); // show table

        // custom event emitted when window is resized
        table.addEventListener('update-table', function(event){
          checkTableLayour(table);
        });
      };

      function checkTableLayour(table) {
        var layout = getComputedStyle(table, ':before').getPropertyValue('content').replace(/\'|"/g, '');
        Util.toggleClass(table, tableExpandedLayoutClass, layout != 'collapsed');
      };

      var tables = document.getElementsByClassName('js-table'),
        tableExpandedLayoutClass = 'table--expanded';
      if( tables.length > 0 ) {
        var j = 0;
        for( var i = 0; i < tables.length; i++) {
          var beforeContent = getComputedStyle(tables[i], ':before').getPropertyValue('content');
          if(beforeContent && beforeContent !='' && beforeContent !='none') {
            (function(i){initTable(tables[i]);})(i);
            j = j + 1;
          } else {
            Util.addClass(tables[i], 'table--loaded');
          }
        }

        if(j > 0) {
          var resizingId = false,
            customEvent = new CustomEvent('update-table');
          window.addEventListener('resize', function(event){
            clearTimeout(resizingId);
            resizingId = setTimeout(doneResizing, 300);
          });

          function doneResizing() {
            for( var i = 0; i < tables.length; i++) {
              (function(i){tables[i].dispatchEvent(customEvent)})(i);
            };
          };

          (window.requestAnimationFrame) // init table layout
            ? window.requestAnimationFrame(doneResizing)
            : doneResizing();
        }
      }
    }());
