@extends('layouts.backend')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">المعلومات الاساسية</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">الرئيسية</a>
            </li>
           
            <li class="breadcrumb-item active">المعلومات الاساسية
            </li>
          </ol>
        </div>
      </div>
    </div>

  </div>
<section id="basic-form-layouts">
    <div class="row match-height">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-colored-form-control">المعلومات الاساسية</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">

                @include('inc.alerts.error')
                @include('inc.alerts.success')
              <form class="form" method="POST" action="{{ route('generalinfo.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-body">
                    <h4 class="form-section"><i class="la la-add"></i>المعلومات الاساسية</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput1">اسم النظام - عربي</label>
                                <input type="text" value="{{ get_general_value('title_ar') }}" id="userinput1" class="form-control border-primary" placeholder="الاسم - عربي" name="general[title_ar]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput1"> اسم النظام - انجليزي </label>
                                <input type="text" value="{{ get_general_value('title_en') }}" id="userinput1" class="form-control border-primary" placeholder="الاسم - انجليزي" name="general[title_en]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput11">عنوان النظام - عربي</label>
                                <input type="text"  value="{{ get_general_value('address_ar') }}"  id="userinput11"  class="form-control border-primary" placeholder="العنوان - عربي" name="general[address_ar]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput11">عنوان النظام - انجليزي</label>
                                <input type="text"  value="{{ get_general_value('address_en') }}"  id="userinput11"  class="form-control border-primary" placeholder="العنوان - انجليزي" name="general[address_en]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_title">وصف النظام - عربي</label>
                                <textarea name="general[dese_ar]" class="form-control" id="" cols="30" rows="10">{{ get_general_value('dese_ar') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_title">وصف النظام - انجليزي</label>
                                <textarea name="general[dese_en]" class="form-control" id="" cols="30" rows="10">{{ get_general_value('dese_en') }}</textarea>
                            </div>
                        </div>
                        
                     
                    </div>
                    <h4 class="form-section"><i class="la la-add"></i>صور النظام</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bio">الشعار في الاعلى - عربي</label>
                                <input type="file"    id="userinput11"  class="form-control border-primary" placeholder="العنوان - انجليزي" name="general_file[header_logo]">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bio">الشعار بالاسفل - انجليزي</label>
                                <input type="file"  value=""  id="userinput11"  class="form-control border-primary" placeholder="العنوان - انجليزي" name="general_file[footer_logo]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video">ايقونة النظام الرئيسي</label>
                                <input type="file"  value=""  id="userinput11"  class="form-control border-primary" placeholder="العنوان - انجليزي" name="general_file[icon]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="main_image">توقيع المدير  </label>
                                <input type="file" id="main_image" class="form-control border-primary" name="general_file[signature]">
                            </div>
                        </div>

                        

                    </div>

                    <h4 class="form-section"><i class="la la-add"></i>مواقع التواصل الاجتماعي</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput2">البريد الإلكتروني</label>
                                <input type="email" value="{{ get_general_value('email') }}"  id="userinput2" class="form-control border-primary" placeholder="البريد الإلكتروني" name="general[email]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput3">رقم الهاتف</label>
                                <input type="number" value="{{ get_general_value('phone') }}" required id="userinput3" class="form-control border-primary" placeholder="رقم الهاتف"
                                name="general[phone]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">فيسبوك</label>
                                <input type="text" value="{{ get_general_value('facebook') }}" id="facebook" class="form-control border-primary" placeholder="فيسبوك" name="general[facebook]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">تويتر</label>
                                <input type="text" value="{{ get_general_value('twitter') }}" id="twitter" class="form-control border-primary" placeholder="تويتر" name="general[twitter]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">انستجرام</label>
                                <input type="text" value="{{ get_general_value('instagram') }}" id="instagram" class="form-control border-primary" placeholder="انستجرام" name="general[instagram]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">لينكد ان</label>
                                <input type="text" value="{{ get_general_value('linkedin') }}" id="linkedin" class="form-control border-primary" placeholder="لينكد ان" name="general[linkedin]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube">يوتيوب</label>
                                <input type="text" value="{{ get_general_value('youtube') }}" id="youtube" class="form-control border-primary" placeholder="يوتيوب" name="general[youtube]">
                            </div>
                        </div>
                    </div>

                    

                    <div class="form-actions left">
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> حفظ
                        </button>
                    </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

@endsection
