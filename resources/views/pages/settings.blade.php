@section('title', 'Settings')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Settings</h2>
    </div>

    <style>
        a {
            text-decoration: none
        }
    </style>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-lg shadow-xs col-12">
            <div class="grid gap-md margin-top-md">
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z" />
                                <path
                                    d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z" />
                                <path
                                    d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z" />
                            </svg>
                        </p>
                        <a href="{{ route('laravel-backup-panel.index') }}" target="_blank"
                            class="margin-y-sm">Backup</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Create database and
                            files backup</p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z" />
                            </svg>
                        </p>
                        <a href="{{ url('health?fresh') }}" target="_blank" class="margin-y-sm">System Health</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Monitor application
                            health</p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                        </p>
                        <a href="{{ url('telescope') }}" target="_blank" class="margin-y-sm">Telescope</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Debug assistant</p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                        </p>
                        <a href="{{ route('auditDatatable') }}" class="margin-y-sm">User Activity</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Site wide activity</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-md margin-top-md">
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.406.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.405 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.404-1.99A1.5 1.5 0 0 1 8 5z" />
                            </svg>
                        </p>
                        <a href="{{ route('loginAttempt') }}" class="margin-y-sm">Login Attempts</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">List of attempted logins
                        </p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3  border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                            </svg>
                        </p>
                        <a href="http://" class="margin-y-sm">Notifications</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Email alerts</p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg>
                        </p>
                        <a href="{{ route('ticketDatatable') }}" class="margin-y-sm">Tickets</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Feedback and feature
                            requests</p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </p>
                        <a href="{{ route('trashedUserDatatable') }}" class="margin-y-sm">Purge</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Purge deleted records
                        </p>
                    </div>
                </div>
                <div class="col-3@lg col-6 border-top border-3 border-contrast-medium shadow-sm radius-xs">
                    <div class="text-center margin-sm">
                        <p class="margin-y-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#737678"
                                class="bi bi-archive-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c.961 0 1.641.633 1.729 1.512h1.295v-.088c-.094-1.518-1.348-2.572-3.03-2.572-2.068 0-3.269 1.377-3.269 3.638v1.073c0 2.267 1.178 3.603 3.27 3.603 1.675 0 2.93-1.02 3.029-2.467v-.093H9.875c-.088.832-.75 1.418-1.729 1.418-1.224 0-1.927-.891-1.927-2.461v-1.06c0-1.583.715-2.503 1.927-2.503Z" />
                            </svg>
                        </p>
                        <a href="{{ url('brand-setting/' . $brandSetting->id . '/edit') }}"
                            class="margin-y-sm">Branding</a>
                        <p class="color-contrast-medium margin-top-sm margin-bottom-md text-sm">Logo, Site Name</p>
                    </div>
                </div>
            </div>
            <div class="margin-y-lg float-right color-contrast-medium text-xs">
                <p>Laravel: <strong>{{ app()->version() }}</strong> PHP:
                    <strong> {{ phpversion() }}</strong>
                </p>
            </div>
        </div>
    </div>

</x-layout>
