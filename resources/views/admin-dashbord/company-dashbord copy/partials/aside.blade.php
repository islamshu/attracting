<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">العاملات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('company.workers.index') }}" data-i18n="nav.dash.ecommerce">جميع العاملات</a>
            </li>
            <li class="active"><a class="menu-item" href="{{ route('company.workers.create') }}" data-i18n="nav.dash.crypto">اضافة جديد</a>
            </li>
            
          </ul>
        </li>

        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">الطلبات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('company.orders.index') }}" data-i18n="nav.dash.ecommerce">جميع الطلبات</a>
            </li>
   
            
          </ul>
        </li>
    
      </ul>
    </div>
  </div>