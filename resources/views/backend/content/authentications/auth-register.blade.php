<!-- <!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Wizard V3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('register_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('register_assets/css/colors/switch.css')}}">
    <link href="{{asset('register_assets/css/colors/color-2.css')}}" rel="alternate stylesheet" type="text/css" title="color-2">
    <link href="{{asset('register_assets/css/colors/color-3.css')}}" rel="alternate stylesheet" type="text/css" title="color-3">
    <link href="{{asset('register_assets/css/colors/color-4.css')}}" rel="alternate stylesheet" type="text/css" title="color-4">
    <link href="{{asset('register_assets/css/colors/color-5.css')}}" rel="alternate stylesheet" type="text/css" title="color-5">

</head> -->

@extends('../../frontend.layouts.main')

@section('title', 'Register Wizard') <!-- Sets the title for the page -->

@section('content')

<body>

    <div class="wrapper wizard d-flex clearfix multisteps-form position-relative">
        <div class="steps order-2 position-relative w-25">
            <div class="multisteps-form__progress">
                <span class="multisteps-form__progress-btn js-active" title="Application data"><i class="far fa-user"></i><span>Personal information</span></span>
                <span class="multisteps-form__progress-btn" title="Tax residency"><i class="far fa-user"></i><span>Medical History</span></span>
                <span class="multisteps-form__progress-btn" title="Indentity documents"><i class="far fa-user"></i><span>Select Objective(s)</span></span>
                <span class="multisteps-form__progress-btn" title="Investability"><i class="far fa-user"></i><span>Make Payment</span></span>
                <span class="multisteps-form__progress-btn" title="Review"><i class="far fa-user"></i><span>Verify Email</span></span>
            </div>
        </div>
        <form class="multisteps-form__form w-75 order-1" action="#" id="wizard">
            <div class="form-area position-relative">
                <!-- div 1 -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="wizard-title text-center">
                                <h3>Please, enter your personal information</h3>
                                <p>Your journey starts here—share your details to get started!</p>
                            </div>
                            <div class="wizard-photo-area">
                                <div class="wizard-photo-upload position-relative">
                                    <label for="files">Upload Image</label>
                                    <input id="files" type='file' onchange="readURL(this);" style="display: none;">
                                    <div class="display-img text-center">
                                        <img id="profile-image" src="{{asset('register_assets/img/pf1.png')}}" alt="your image" />
                                    </div>
                                </div>
                                <div class="photo-upload-text">Not more than 1mb. JPG and PNG extensions only.
                                </div>
                            </div>
                            <div class="wizard-form-field mb-85">
                                <div class="wizard-form-input">
                                    <label>First Name</label>
                                    <input type="text" name="first_name">
                                </div>
                                <div class="wizard-form-input">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name">
                                </div>
                                <div class="wizard-form-input">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name">
                                </div>
                                <div class="wizard-form-input">
                                    <label>Gender</label>
                                    <div class="wizard-checked">
                                        <label class="checkbox-circle">
                                            <input type="radio" checked="checked" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                            Male
                                        </label>
                                    </div>
                                    <div class="wizard-checked">
                                        <label class="checkbox-circle">
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                            Female
                                        </label>
                                    </div>
                                </div>

                                <div class="wizard-form-input mb-60 mt-60">
                                    <div class="line"></div>
                                </div>

                                <div class="wizard-form-input">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_number">
                                </div>

                                <div class="wizard-form-input">
                                    <label>Email Address</label>
                                    <input type="email" name="email">
                                </div>

                                <div class="wizard-form-input">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                </div>

                                <div class="wizard-form-input">
                                    <label>Confirm Password</label>
                                    <input type="password" name="c_password">
                                </div>

                                <!-- <div class="wizard-form-input mb-60 mt-60">
                                    <div class="line"></div>
                                </div>

                                <div class="wizard-form-input">
                                    <label>Do you use eye glass?</label>
                                    <div class="wizard-checked">
                                        <label class="checkbox-circle">
                                            <input type="radio" name="eye_glass" value="Yes">
                                            <span class="checkmark"></span>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="wizard-checked">
                                        <label class="checkbox-circle">
                                            <input type="radio" checked="checked" name="eye_glass" value="No">
                                            <span class="checkmark"></span>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div> -->

                                <div class="form-field-text">
                                    Please ensure that all details are filled correctly.
                                </div>

                            </div>
                            <div class="wizard-v3-progress">
                                <span>1 to 5 step</span>
                                <h3>0% to complete</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 0%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="vector-img-one">
                            <img src="{{asset('register_assets/img/vb1.png')}}" alt="">
                        </div>
                        <div class="actions">
                            <ul>
                                <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 2 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms section-padding">
                        <div class="inner pb-100 clearfix">
                            <div class="wizard-title text-center">
                                <h3>Medical history and challenges quick check</h3>
                                <p>Your health matters—help us understand your story!</p>
                            </div>
                            
                            <div class="wizard-form-field mb-85">
                                <div class="wizard-form-input">
                                    <label>Age</label>
                                    <input type="text" name="age">
                                </div>
                                <div class="wizard-form-input">
                                    <label>Height (ft)</label>
                                    <input type="text" name="height">
                                </div>
                                <div class="wizard-form-input">
                                    <label>Weight (kg)</label>
                                    <input type="text" name="weight">
                                </div>
                                <div class="wizard-day-item mt-60">
                                    <span class="wizard-sub-text">Do you suffer from any of the below?</span>
                                    <div class="wizard-form-input">
                                        <label>Visual Impairment</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" checked="checked" name="visual" value="none">
                                                <span class="checkmark"></span>
                                                None
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="long_sightedness">
                                                <span class="checkmark"></span>
                                                Long sightedness
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="short_sightedness">
                                                <span class="checkmark"></span>
                                                Short sightedness
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label></label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="color_blindness">
                                                <span class="checkmark"></span>
                                                Color Blindness
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Hearing Aid</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" checked="checked" name="hearing_aid" value="none">
                                                <span class="checkmark"></span>
                                                None
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="hearing_aid" value="bte">
                                                <span class="checkmark"></span>
                                                BTE
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="hearing_aid" value="ite">
                                                <span class="checkmark"></span>
                                                ITE
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="hearing_aid" value="rite">
                                                <span class="checkmark"></span>
                                                RITE
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="hearing_aid" value="itc">
                                                <span class="checkmark"></span>
                                                ITC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label></label>                                        
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="hearing_aid" value="cros_bicros">
                                                <span class="checkmark"></span>
                                                CROS/BiCROS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Physical Disability</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" checked="checked" name="disability" value="none">
                                                <span class="checkmark"></span>
                                                None
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="disability" value="amputated">
                                                <span class="checkmark"></span>
                                                Amputated
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="disability" value="asthmatic">
                                                <span class="checkmark"></span>
                                                Asthmatic
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="disability" value="epilepsy">
                                                <span class="checkmark"></span>
                                                Epilepsy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Terminal Illness</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" checked="checked" name="terminal_illness" value="none">
                                                <span class="checkmark"></span>
                                                None
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="terminal_illness" value="ulcer">
                                                <span class="checkmark"></span>
                                                Ulcer
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="terminal_illness" value="cancer">
                                                <span class="checkmark"></span>
                                                Cancer
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="terminal_illness" value="hiv_aids">
                                                <span class="checkmark"></span>
                                                HIV/AIDS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label></label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="terminal_illness" value="abdominal_pain">
                                                <span class="checkmark"></span>
                                                Abdominal Pain
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="wizard-day-item mt-60">
                                    <span class="wizard-sub-text">Do you do any of the following?</span>
                                    <div class="wizard-form-input">
                                        <label>Marijuana(Weed) or Cocaine</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="yes">
                                                <span class="checkmark"></span>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="no">
                                                <span class="checkmark"></span>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Alcohol</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="yes">
                                                <span class="checkmark"></span>
                                                Often
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="no">
                                                <span class="checkmark"></span>
                                                Casually
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="no">
                                                <span class="checkmark"></span>
                                                Daily User
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Are you on any prescribed medication?</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="yes">
                                                <span class="checkmark"></span>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="no">
                                                <span class="checkmark"></span>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-note-subject">
                                        <div class="wizard-form-input">
                                            <label></label>
                                            <textarea placeholder="If yes, please tell us more about your medations..."></textarea>
                                        </div>
                                    </div>
                                    <div class="wizard-form-input">
                                        <label>Have you failed drug test before?</label>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="yes">
                                                <span class="checkmark"></span>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="wizard-checked">
                                            <label class="checkbox-circle">
                                                <input type="radio" name="visual" value="no">
                                                <span class="checkmark"></span>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="wizard-note-subject">
                                        <div class="wizard-form-input">
                                            <label></label>
                                            <textarea placeholder="If yes, please state the reason here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-v3-progress">
                                <span>2 to 5 step</span>
                                <h3>38% to complete</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 38%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="vector-img-one">
                            <img src="{{asset('register_assets/img/vb2.png')}}" alt="">
                        </div>
                        <div class="actions">
                            <ul>
                                <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                                <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 3 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">

                            <div class="wizard-title text-center">
                                <h3>Select your training objective(s)</h3>
                                <p>Shape your path—choose the skills you want to master!</p>
                            </div>                            

                            <div class="wizard-solution-select">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="option_item">
                                            <input type="checkbox" class="checkbox">
                                            <span class="option_inner">
                                                <span class="tickmark"></span>
                                                <span class="icon"><img src="{{asset('assets/images/service/truck.jpg')}}" alt=""></span>
                                                <span class="name">Truck</span>
                                                <span class="amount">$449.99</span>
                                                <span class="duration">14 weeks</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="option_item">
                                            <input type="checkbox" class="checkbox">
                                            <span class="option_inner">
                                                <span class="tickmark"></span>
                                                <span class="icon"><img src="{{asset('assets/images/service/car.jpg')}}" alt=""></span>
                                                <span class="name">Forklift</span>
                                                <span class="amount">$359.99</span>
                                                <span class="duration">10 weeks</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="option_item">
                                            <input type="checkbox" class="checkbox">
                                            <span class="option_inner">
                                                <span class="tickmark"></span>
                                                <span class="icon"><img src="{{asset('assets/images/service/brt.jpg')}}" alt=""></span>
                                                <span class="name">Bus/BRT</span>
                                                <span class="amount">$249.99</span>
                                                <span class="duration">12 weeks</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="option_item">
                                            <input type="checkbox" class="checkbox">
                                            <span class="option_inner">
                                                <span class="tickmark"></span>
                                                <span class="icon"><img src="{{asset('assets/images/service/car.jpg')}}" alt=""></span>
                                                <span class="name">Conventional</span>
                                                <span class="amount">$149.99</span>
                                                <span class="duration">8 weeks</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="wizard-form-input mb-60 mt-60">
                                <div class="line line2"></div>
                            </div>

                            <div class="wizard-duration mb-60">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="mb-40">Pre-requisites:</h3>
                                        <h5>Please ensure that the following requirements are met before proceeding to make payment:</h5>
                                        <p class="pre-requisite-obj">Truck Driving Applicants</p>
                                        <ul class="mb-25">
                                            <li>You are required to have a valid driving licence.</li>
                                            <li>It is required of you to have at least 6 months regular vehicle driving experience.</li>
                                            <li>You do not have any physical challenge or disability.</li>
                                        </ul>
                                        <p class="pre-requisite-obj">Bus/BRT Driving Applicants</p>
                                        <ul class="mb-25">
                                            <li>You are required to have a valid driving licence.</li>
                                            <li>It is required of you to have at least 3 months regular vehicle driving experience.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="duration-option">
                                            <!-- <input type="radio" name="duration-service" value="6 weeks" class="d-checkbox"> -->
                                            <!-- <span class="checkbox-circle-tick">$</span> -->
                                            <span class="duration-box text-center">
                                                <span class="total-amount">$0</span>
                                                <span class="total-duration">0 Weeks</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-form-input mb-60 mt-60">
                                <div class="line line2"></div>
                            </div>
                            <!-- <div class="wizard-day-item">
                                <span class="wizard-sub-text">Choose the included services</span>
                                <div class="wizard-checkbox-option">
                                    <ul>
                                        <li>
                                            <label class="block-option">
                                                <input type="checkbox" name="day-checkout" class="checked-checkbox">
                                                <span class="checkbox-tick"></span>
                                                <span class="day-label">Select Day</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="block-option">
                                                <input type="checkbox" name="day-checkout" class="checked-checkbox">
                                                <span class="checkbox-tick"></span>
                                                <span class="day-label">Select Day</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="block-option">
                                                <input type="checkbox" name="day-checkout" class="checked-checkbox">
                                                <span class="checkbox-tick"></span>
                                                <span class="day-label">Select Day</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="block-option">
                                                <input type="checkbox" name="day-checkout" class="checked-checkbox">
                                                <span class="checkbox-tick"></span>
                                                <span class="day-label">Select Day</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wizard-form-input mb-60 mt-60">
                                <div class="line line2"></div>
                            </div>
                            <div class="wizard-document-upload pb-200">
                                <span class="wizard-sub-text">Upload the documents</span>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">jpg or .pdf should  be more than 500KB or 300PI</label>
                                </div>
                            </div> -->
                            <div class="wizard-v3-progress">
                                <span>3 to 5 step</span>
                                <h3>59% to complete</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 59%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./inner -->
                        <div class="vector-img-one">
                            <img src="{{asset('register_assets/img/vb3.png')}}" alt="">
                        </div>
                        <div class="actions">
                            <ul>
                                <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                                <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 4 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-200 clearfix">
                            <div class="wizard-title text-center">
                                <h3>Choose payment method</h3>
                                <p>Secure your spot—select your preferred payment option!</p>
                            </div>
                            <div id="slider-service" class="wizard-service-slide">
                                <label class="services-box-item">
                                    <input type="checkbox" name="contact_person" value="Mr Leo" class="service-checkbox">
                                    <span class="w-service-box text-center position-relative">
                                        <span class="tooltip-info" data-toggle="tooltip" data-placement="top" title="Mr Leo Service officer"></span>
                                        <span class="service-icon">
                                            <img src="{{asset('register_assets/img/paystack.png')}}" alt="">
                                        </span>
                                        <!-- <span class="service-text">
                                            Paystack
                                        </span> -->
                                        <span class="option-seclect">
                                            <span>Selected</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="wizard-v3-progress">
                                <span>4 to 5 step</span>
                                <h3>79% to complete</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 79%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="vector-img-one">
                            <img src="{{asset('register_assets/img/vb4.png')}}" alt="">
                        </div>
                        <div class="actions">
                            <ul>
                                <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
                                <li><span class="js-btn-next" title="NEXT">SUBMIT <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 5 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="container">
                            <div class="thank-you-wrapper position-relative thank-wrapper-style-two">
                                <!-- <div class="thank-you-close text-center">x</div> -->
                                <div class="thank-txt text-center">
                                    <div class="text-area-thank">
                                        <div class="thank-icon">
                                            <img src="{{asset('register_assets/img/success.png')}}" alt="">
                                        </div>
                                        <h1>Success!</h1>
                                        <p>Please check your email to verify your account.</p>
                                        <div class="okey-btn text-uppercase text-center">
                                            <a href="#">Resend Verification Email</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="{{asset('register_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('register_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('register_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('register_assets/js/slick.min.js')}}"></script>
    <script src="{{asset('register_assets/js/main.js')}}"></script>
    <script src="{{asset('register_assets/js/switch.js')}}"></script>
    <script>
        $(document).ready(function () {
            function updateSummary() {
                let totalAmount = 0;
                let totalDuration = 0;

                $(".option_item .checkbox:checked").each(function () {
                    // Parse the amount and duration from the respective spans
                    const amount = parseFloat($(this).siblings(".option_inner").find(".amount").text().replace('$', ''));
                    const duration = parseInt($(this).siblings(".option_inner").find(".duration").text().replace(' weeks', ''));

                    // Add to the totals
                    totalAmount += amount;
                    totalDuration += duration;
                    console.log(totalAmount)
                    console.log(totalDuration)
                });

                // Update the summary box
                $(".duration-option .total-amount").text(`$${totalAmount}`);
                $(".duration-option .total-duration").text(`${totalDuration} Weeks`);
            }

            // Attach change event listener to all checkboxes
            $(".option_item .checkbox").on("change", updateSummary);

            // Initialize the summary
            updateSummary();
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile-image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        $("#customFile").change(function() {
            filename = this.files[0].name
        });
    </script>
<!-- </body>


</html> -->
@endsection()