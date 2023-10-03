            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images/logo.png') }}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images/logo_sm.png') }}" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images/logo_sm_dark.png') }}" alt="" height="16">
                    </span>
                </a>

                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Dashboard</li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>

                        </li>

                        <li class="side-nav-title side-nav-item">Ecommerce</li>

                        <li class="side-nav-item">
                            <a href="{{ route('category.index') }}" class="side-nav-link">
                                <i class="dripicons-archive"></i>
                                <span> Category </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('sub-category.index') }}" class="side-nav-link">
                                <i class='uil uil-box'></i>
                                <span> Sub Category </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('brands.index') }}" class="side-nav-link">
                                <i class="dripicons-tags"></i>
                                <span>Brands</span>
                            </a>

                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('attribute.index') }}" class="side-nav-link">
                                <i class="mdi mdi-tag-outline"></i>
                                <span> Attributes </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('tax-rule.index') }}" class="side-nav-link">
                                <i class="mdi mdi-home-assistant"></i>
                                <span> Tax Rules </span>
                            </a>

                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="mdi mdi-car-limousine"></i>
                                <span> Shipping Rules </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('collection.index') }}" class="side-nav-link">
                                <i class="mdi mdi-archive-arrow-down-outline"></i>
                                <span> Collections </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('bundle_deals.index') }}" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Bundle Deals </span>
                            </a>

                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('vouchers.index') }}" class="side-nav-link">
                                <i class="dripicons-ticket"></i>
                                <span> Vouchers </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('product.index') }}" class="side-nav-link">
                                <i class="dripicons-shopping-bag"></i>
                                <span> Products </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('flash_sales.index') }}" class="side-nav-link">
                                <i class="mdi mdi-sale"></i>
                                <span> Flash Sales </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('users.index') }}" class="side-nav-link">
                                <i class="uil-package"></i>
                                <span> users </span>
                            </a>

                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('roles.index') }}" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Roles </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="{{ route('accounts.index') }}" class="side-nav-link">
                                <i class="uil-box"></i>
                                <span> Accounts </span>
                            </a>
                            

                        </li>



                        <li class="side-nav-item">
                            <a href="{{ route("pages.index") }}" class="side-nav-link">
                                <i class="uil-layer-group"></i>
                                <span> Pages </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route("home_sliders.index") }}" class="side-nav-link">
                                <i class="uil-streering"></i>
                                <span> Home Sliders </span>
                            </a>

                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false"
                                aria-controls="sidebarForms" class="side-nav-link">
                                <i class="uil-document-layout-center"></i>
                                <span> Forms </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="form-elements.html">Basic Elements</a>
                                    </li>
                                    <li>
                                        <a href="form-advanced.html">Form Advanced</a>
                                    </li>
                                    <li>
                                        <a href="form-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="form-wizard.html">Wizard</a>
                                    </li>
                                    <li>
                                        <a href="form-fileuploads.html">File Uploads</a>
                                    </li>
                                    <li>
                                        <a href="form-editors.html">Editors</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false"
                                aria-controls="sidebarCharts" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false"
                                            aria-controls="sidebarApexCharts">
                                            <span> Apex Charts </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarApexCharts">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="charts-apex-area.html">Area</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-bar.html">Bar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-bubble.html">Bubble</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-candlestick.html">Candlestick</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-column.html">Column</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-heatmap.html">Heatmap</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-line.html">Line</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-mixed.html">Mixed</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-pie.html">Pie</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-radar.html">Radar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-radialbar.html">RadialBar</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-scatter.html">Scatter</a>
                                                </li>
                                                <li>
                                                    <a href="charts-apex-sparklines.html">Sparklines</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="charts-brite.html">Britecharts</a>
                                    </li>
                                    <li>
                                        <a href="charts-chartjs.html">Chartjs</a>
                                    </li>
                                    <li>
                                        <a href="charts-sparkline.html">Sparklines</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false"
                                aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> Tables </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="tables-basic.html">Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatable.html">Data Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false"
                                aria-controls="sidebarMaps" class="side-nav-link">
                                <i class="uil-location-point"></i>
                                <span> Maps </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="maps-google.html">Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                                aria-controls="sidebarMultiLevel" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Multi Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMultiLevel">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                                            aria-controls="sidebarSecondLevel">
                                            <span> Second Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarSecondLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                                            aria-controls="sidebarThirdLevel">
                                            <span> Third Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarThirdLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarFourthLevel"
                                                        aria-expanded="false" aria-controls="sidebarFourthLevel">
                                                        <span> Item 2 </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarFourthLevel">
                                                        <ul class="side-nav-forth-level">
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.1</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.2</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>


                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
