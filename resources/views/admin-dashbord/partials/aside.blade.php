<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      

        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> الإعدادات العامة</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('generalinfo.index') }}" data-i18n="nav.dash.ecommerce">اعدادات الموقع</a>
            </li>
            <li ><a class="menu-item" href="{{ route('generalinfo.paid') }}" data-i18n="nav.dash.crypto">اعدادات الدفع </a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> القوائم</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('menu.index') }}" data-i18n="nav.dash.ecommerce">جميع القوائم</a>
            </li>
            <li ><a class="menu-item" href="{{ route('menu.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> السلايدر</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('sliders.index') }}" data-i18n="nav.dash.ecommerce">جميع السلايدرات</a>
            </li>
            <li ><a class="menu-item" href="{{ route('sliders.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="{{ route('firstsection.index') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">مزايانا </span></a>
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> خدماتنا</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('services.index') }}" data-i18n="nav.dash.ecommerce">جميع الخدمات</a>
            </li>
            <li ><a class="menu-item" href="{{ route('services.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> الشركات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('company.index') }}" data-i18n="nav.dash.ecommerce">جميع الشركات</a>
            </li>
            <li ><a class="menu-item" href="{{ route('company.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="{{ route('orders.index') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> الطلبات</span></a>
          
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> العاملات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('workers.index') }}" data-i18n="nav.dash.ecommerce">جميع العاملات</a>
            </li>
            <li ><a class="menu-item" href="{{ route('workers.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a ><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main"> خطوات كيفية العمل</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('how_its_work.index') }}" data-i18n="nav.dash.ecommerce">جميع الخطوات</a>
            </li>
            <li ><a class="menu-item" href="{{ route('how_its_work.create') }}" data-i18n="nav.dash.crypto">اضف جديد</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="{{ route('pages.index') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">الصفحات </span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('messages') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">طلبات رسائل المستخدمين </span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('comapny_message.index') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">طلبات رسائل الشركات </span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('frontmessage.index') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">رسائل الواجهة الرئيسية   </span></a>
        </li>
        
        <li class=" nav-item"><a href="{{ route('messageletter.index') }}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">طلبات البريد الإلكتروني </span></a>
        </li>
         
  

        
        <li class="nav-item ">
          <a class="menu-item" href="#" data-i18n="nav.menu_levels.second_level_child.main">
              <i class="la la-thumb-tack"></i>
              <span class="menu-title" data-i18n="nav.page_layouts.main">الترجمة</span>
          </a>

      <ul class="menu-content" style="">
          <li class="is-shown"><a class="menu-item" href="{{ route('show_translate','ar') }}" data-i18n="nav.menu_levels.second_level_child.third_level">ترجمة الخاصة باللغة العربية  </a>
          </li>
          <li class="is-shown"><a class="menu-item" href="{{ route('show_translate','en') }}" data-i18n="nav.menu_levels.second_level_child.third_level">الترجمة الخاصة باللغة الانجليزية </a>
          </li>
        </ul>
      </li>
    
      </ul>
    </div>
  </div>