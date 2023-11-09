<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.show') }}" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">لوحة الإدارة</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                {{-- ----------------------- Temporary --------------------------- --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.home') }}" class="nav-link active">
                                <i class="fa fa-home nav-icon"></i>
                                <p> المستخدمين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mainmenues.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>القوائم الرئيسية</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('submenues.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> القوائم الفرعية </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('permissions.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الإجراءات </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rules.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الأدوار </p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- ----------------------- Accounts ---------------------------- --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            الحسابات العامة
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('accounts.home') }}" class="nav-link active">
                                <i class="fa fa-home nav-icon"></i>
                                <p> الرئيسية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.cats.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>تصنيفات الحسابات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>طبيعة الحسابات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.setting') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>إعدادات المحاسبة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('treasuries.home') }}" class="nav-link">
                                <i class="nav-icon fa fa-ban" aria-hidden="true"></i>
                                <p>
                                    الخــــزن
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- --------------------- Store --------------------------------- --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            التخزين
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('store.home') }}" class="nav-link active">
                                <i class="fa fa-home nav-icon"></i>
                                <p>الرئيسية</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('store.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> العنابر </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rooms.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الغرف </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('tables.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الطبليات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('store.items.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> اسماء الأصناف</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('store.settings') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>الضبط</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- The application users --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            المشتريات
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vendors.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الموردين </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('mainmenues.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الضبط </p>
                            </a>
                        </li>

                    </ul>
                </li>


                {{-- ----------------------- Sales ------------------------------- --}}
                <li
                    class="nav-item {{ request()->is('admin/sales/*')? 'menu-open':'' }}">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            المبيعات
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('items.cats.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>تصنيفات المبيعات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('clients.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>العملاء</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contracts.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>العقود</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('items.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p>المنتجات والخدمات</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ----------------------- Movements ------------------------------- --}}
                <li class="nav-item {{ request()->is('admin/receipts/*')? 'menu-open':'' }}">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            التشغـــــــــــيل
                            <i class=" fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('receipts.home') }}" class="nav-link active">
                                <i class="fa fa-home nav-icon"></i>
                                <p> الرئيسية </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('receipts.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p> سندات الإدخال </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('items.cats.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p> سندات الاخراج </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('clients.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> استقبال</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('clients.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> اخراج</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contracts.home') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p> ترتيب مخزن </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('items.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> سجل الحركات المحذوفة </p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- The application users --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            الموارد البشرية
                            <i class="fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('users.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الموظفين </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> اسماء الوظائف </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> سير العمل </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('mainmenues.home') }}" class="nav-link">
                                <i class="fa fa-tag nav-icon"></i>
                                <p> الضبط </p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
