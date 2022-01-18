<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/admin">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('uploads/'. get_general_value('icon'))}}">
              <h3 class="brand-text">{{ get_general_value('title_ar') }}</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">
                  <span class="user-name text-bold-700">{{ auth()->user()->name }}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="{{asset('backend/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="ft-user"></i>تعديل الملف الشخصي</a>
                <a class="dropdown-item" href="{{ route('messages') }}"><i class="ft-mail"></i> الرسائل</a>
               
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ft-power"></i>  تسجيل خروج</a>
              </div>
            </li>
          
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label "  data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ auth()->user()->unreadNotifications->count() }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">{{ auth()->user()->unreadNotifications->count() }} New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  @foreach (auth()->user()->unreadNotifications; as $notification)
                      
                  
                  <a class="mark-as-read">
                    <div class="media">
                      <div class="media-left align-self-center"><i  @if( $notification->data['type']  =='order') class="ft-plus-square icon-bg-circle bg-cyan" @else class="ft-download-cloud icon-bg-circle bg-red bg-darken-1" @endif ></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">{{ $notification->data['title'] }}</h6>
                        <p class="notification-text font-small-3 text-muted">{{ $notification->data['desc'] }}</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ $notification->created_at->diffForHumans() }}</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  @endforeach
                  
             
                </li>
              </ul>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Messages</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-warning float-right m-0">{{ App\SendMessage::where('status',0)->count() }} New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  @foreach (App\SendMessage::where('status',0)->get() as $item)
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{asset('backend/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">{{ $item->user->name }}</h6>
                        <p class="notification-text font-small-3 text-muted">{{ $item->title }}</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ $item->created_at->diffForHumans() }}</time>
                        </small>
                      </div>
                    </div>
                  </a>
              
                  @endforeach
                 
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>