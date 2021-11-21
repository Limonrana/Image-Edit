<tr>
    <td class="table-column-pr-0">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input serviceCheckbox" id="productsCheckHome">
            <label class="custom-control-label" for="productsCheckHome"></label>
        </div>
    </td>
    <td class="table-column-pl-0">
        <a class="d-flex align-items-center" href="{{ route('pages.common.edit', 'home') }}">
            <div class="avatar avatar-soft-dark avatar-circle">
                <span class="avatar-initials">H</span>
            </div>
            <div class="ml-3">
                <span class="d-block h5 text-hover-primary mb-0">
                    Home
                    <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i>
                </span>
            </div>
        </a>
    </td>
    <td>/</td>
    <td>
        <label class="toggle-switch toggle-switch-sm" for="stocksCheckboxHome">
            <input type="checkbox" class="toggle-switch-input" id="stocksCheckboxHome" checked readonly>
            <span class="toggle-switch-label">
                <span class="toggle-switch-indicator"></span>
            </span>
        </label>
    </td>
    <td>Default</td>
    <td>Default</td>
    <td>
        <div class="btn-group" role="group">
            <a class="btn btn-sm btn-white" href="{{ route('pages.common.edit', 'home') }}">
                <i class="tio-edit"></i> Edit
            </a>
            <!-- Unfold -->
            <div class="hs-unfold btn-group">
                <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                   data-hs-unfold-options='{
                                             "target": "#productsEditDropdownHome",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                <div id="productsEditDropdownHome" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                    <a class="dropdown-item" href="{{ route('pages.show', 'home') }}">
                        <i class="tio-agenda-view-outlined"></i> Preview
                    </a>
                </div>
            </div>
            <!-- End Unfold -->
        </div>
    </td>
</tr>
<tr>
    <td class="table-column-pr-0">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input serviceCheckbox" id="productsCheckAbout">
            <label class="custom-control-label" for="productsCheckAbout"></label>
        </div>
    </td>
    <td class="table-column-pl-0">
        <a class="d-flex align-items-center" href="{{ route('pages.common.edit', 'about') }}">
            <div class="avatar avatar-soft-dark avatar-circle">
                <span class="avatar-initials">A</span>
            </div>
            <div class="ml-3">
                <span class="d-block h5 text-hover-primary mb-0">
                    About
                    <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i>
                </span>
            </div>
        </a>
    </td>
    <td>/about</td>
    <td>
        <label class="toggle-switch toggle-switch-sm" for="stocksCheckboxAbout">
            <input type="checkbox" class="toggle-switch-input" id="stocksCheckboxAbout" checked readonly>
            <span class="toggle-switch-label">
                <span class="toggle-switch-indicator"></span>
            </span>
        </label>
    </td>
    <td>Default</td>
    <td>Default</td>
    <td>
        <div class="btn-group" role="group">
            <a class="btn btn-sm btn-white" href="{{ route('pages.common.edit', 'about') }}">
                <i class="tio-edit"></i> Edit
            </a>
            <!-- Unfold -->
            <div class="hs-unfold btn-group">
                <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                   data-hs-unfold-options='{
                                             "target": "#productsEditDropdownAbout",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                <div id="productsEditDropdownAbout" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                    <a class="dropdown-item" href="{{ route('pages.show', 'About') }}">
                        <i class="tio-agenda-view-outlined"></i> Preview
                    </a>
                </div>
            </div>
            <!-- End Unfold -->
        </div>
    </td>
</tr>
<tr>
    <td class="table-column-pr-0">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input serviceCheckbox" id="productsCheckContact">
            <label class="custom-control-label" for="productsCheckContact"></label>
        </div>
    </td>
    <td class="table-column-pl-0">
        <a class="d-flex align-items-center" href="{{ route('pages.common.edit', 'contact') }}">
            <div class="avatar avatar-soft-dark avatar-circle">
                <span class="avatar-initials">C</span>
            </div>
            <div class="ml-3">
                <span class="d-block h5 text-hover-primary mb-0">
                    Contact
                    <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i>
                </span>
            </div>
        </a>
    </td>
    <td>/contact</td>
    <td>
        <label class="toggle-switch toggle-switch-sm" for="stocksCheckboxContact">
            <input type="checkbox" class="toggle-switch-input" id="stocksCheckboxContact" checked readonly>
            <span class="toggle-switch-label">
                <span class="toggle-switch-indicator"></span>
            </span>
        </label>
    </td>
    <td>Default</td>
    <td>Default</td>
    <td>
        <div class="btn-group" role="group">
            <a class="btn btn-sm btn-white" href="{{ route('pages.common.edit', 'contact') }}">
                <i class="tio-edit"></i> Edit
            </a>
            <!-- Unfold -->
            <div class="hs-unfold btn-group">
                <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                   data-hs-unfold-options='{
                                             "target": "#productsEditDropdownContact",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                <div id="productsEditDropdownContact" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                    <a class="dropdown-item" href="{{ route('pages.show', 'Contact') }}">
                        <i class="tio-agenda-view-outlined"></i> Preview
                    </a>
                </div>
            </div>
            <!-- End Unfold -->
        </div>
    </td>
</tr>
