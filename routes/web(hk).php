<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecurityCompanyController;
use App\Http\Controllers\SeniorSecurityOfficerController;
use App\Http\Controllers\SecurityOfficerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceManagementController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\SeasonalWorkersController;
use App\Http\Controllers\IncidentCategoryController;
use App\Http\Controllers\IncidentManagementController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\BlockAndUnitsController;
use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AdhocJobs;
use App\Http\Controllers\CronController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleControllerCopy;
use App\Http\Controllers\WalkInRegistration;;
use App\Http\Controllers\SecurityGroupController;
use App\Http\Controllers\WalkInRegistrationList;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\RankMasterController;
use App\Http\Controllers\ClientMasterController;
use App\Http\Controllers\JobTrainiCertificateController;
use App\Http\Controllers\AwardCertificateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\AdditionalDutyController;
use App\Http\Controllers\HrsManagementController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\BasicPayController;
use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\DutyTypeController;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\OccurrenceController;
use App\Http\Controllers\OccurrenceSubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
   return Redirect::to('login');
});

Route::get('/jobapplication_form', function(){
        return Redirect::to('Application_Form');
     });
     Route::get('/pre_employment_training', function(){
        return Redirect::to('Pre_EmploymentTraining');
     });
     Route::get('/appointment', function(){
        return Redirect::to('Appointment');
     });

     Route::get('/Application_Form', [JobApplicationController::class, 'Application_Form'])->name('Application_Form');
     Route::post('/saveapplicantDeatils', [JobApplicationController::class, 'saveapplicantDeatils'])->name('saveapplicantDeatils');
     Route::get('/Pre_EmploymentTraining', [JobApplicationController::class, 'Pre_EmploymentTraining'])->name('Pre_EmploymentTraining');
     Route::get('/Appointment', [JobApplicationController::class, 'Appointment'])->name('Appointment');

     Route::get('/Pre_EmploymentTrainingList', [JobApplicationController::class, 'Pre_EmploymentTrainingList'])->name('Pre_EmploymentTrainingList');
     Route::get('/EmployeeTraining_pdf/{id}', [JobApplicationController::class, 'EmployeeTraining_pdf'])->name('EmployeeTraining_pdf');
     Route::get('/AppointmentList', [JobApplicationController::class, 'AppointmentList'])->name('AppointmentList');
     Route::get('/Appointment_pdf/{id}', [JobApplicationController::class, 'Appointment_pdf'])->name('Appointment_pdf');

     //Route::get('/PreEmploymentTrainingAddSign', [JobApplicationController::class, 'PreEmploymentTrainingAddSign'])->name('PreEmploymentTrainingAddSign');
     //Route::get('/AppointmentAddSign', [JobApplicationController::class, 'AppointmentAddSign'])->name('AppointmentAddSign');

    Route::post('/getApplicantUser', [JobApplicationController::class, 'getApplicantUser'])->name('getApplicantUser');
    Route::post('/savePreEmploymentTraining', [JobApplicationController::class, 'savePreEmploymentTraining'])->name('savePreEmploymentTraining');
    Route::post('/saveEImage', [JobApplicationController::class, 'saveEImage'])->name('saveEImage');

    Route::get('/PreEmployement_VerfiyStatus/{id}/{session_id}', [JobApplicationController::class, 'PreEmployement_VerfiyStatus'])->name('PreEmployement_VerfiyStatus');
    Route::get('/Appointement_VerfiyStatus/{id}/{session_id}', [JobApplicationController::class, 'Appointement_VerfiyStatus'])->name('Appointement_VerfiyStatus');


    Route::get('/appointmentAcknowledgeList', [HrsManagementController::class, 'appointmentAcknowledgeList'])->name('appointmentAcknowledgeList');
    Route::get('/appointmentAcknowledgeView/{id?}', [HrsManagementController::class, 'appointmentAcknowledgeView'])->name('appointmentAcknowledgeView');
    Route::post('/appointmentAcknowledgeEdit/{id?}', [HrsManagementController::class, 'appointmentAcknowledgeEdit'])->name('appointmentAcknowledgeEdit');
//Route::group(['middleware' => ['auth']], function() {
//    Route::resource('roles', RoleController::class);
//
//});

//Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/forget_password', [LoginController::class, 'forgetPasswordSent'])->name('forget_password');
Route::post('/forget_password', [LoginController::class, 'forgetPasswordMail'])->name('forget_password');
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});


/*Vechile Entry form*/
Route::get('/vechile_registration/{id?}', [WalkInRegistration::class, 'vechileRegistration'])->name('vechile_registration');
Route::get('/search_vechile_registration/{id?}', [WalkInRegistration::class, 'searchVechileRegistration'])->name('search_vechile_registration');
Route::post('/vechile_registration', [WalkInRegistration::class, 'vechileRegistrationSave'])->name('vechile_registration');
Route::post('/checkout_registration', [WalkInRegistration::class, 'vechileRegistrationCheckout'])->name('checkout_registration');
Route::post('/checkout_registration_block', [WalkInRegistration::class, 'vechileRegistrationCheckoutBlock'])->name('checkout_registration_block');

Route::get('/walkin_registration/{id?}', [WalkInRegistration::class, 'walkinRegistration'])->name('walkin_registration');
Route::post('/walkin_registration', [WalkInRegistration::class, 'walkinRegistrationSave'])->name('walkin_registration');





Auth::routes();

// Usergroup
Route::get('/usergroupList', [UserGroupController::class, 'usergroup'])->name('usergroupList');
Route::post('/usergroupSave', [UserGroupController::class, 'save'])->name('usergroupSave');
Route::get('/usergroupEdit', [UserGroupController::class, 'edit'])->name('usergroupEdit');
Route::get('/usergroup_update', [UserGroupController::class, 'update'])->name('usergroup_update');


// Rank Master
Route::get('/rankmasterList', [RankMasterController::class, 'rankmaster'])->name('rankmasterList');
Route::post('/rankmasterList', [RankMasterController::class, 'rankmaster'])->name('rankmasterList');
Route::post('/rankmasterSave', [RankMasterController::class, 'save'])->name('rankmasterSave');
Route::get('/rankmasterEdit', [RankMasterController::class, 'edit'])->name('rankmasterEdit');
Route::get('/rankmasterActive', [RankMasterController::class, 'rankmasterActive'])->name('rankmasterActive');
Route::get('/rankmasterDeactive', [RankMasterController::class, 'rankmasterDeactive'])->name('rankmasterDeactive');
Route::get('/rankasterUpdate', [RankMasterController::class, 'update'])->name('rankasterUpdate');

// Client Master
Route::get('/clientmasterList', [ClientMasterController::class, 'clientmaster'])->name('clientmasterList');
Route::post('/clientmasterList', [ClientMasterController::class, 'clientmaster'])->name('clientmasterList');
Route::post('/clientmasterSave', [ClientMasterController::class, 'save'])->name('clientmasterSave');
Route::get('/clientmasterEdit', [ClientMasterController::class, 'edit'])->name('clientmasterEdit');
Route::get('/clientmasterActive', [ClientMasterController::class, 'clientmasterActive'])->name('clientmasterActive');
Route::get('/clientmasterDeactive', [ClientMasterController::class, 'clientmasterDeactive'])->name('clientmasterDeactive');
Route::get('/clientaster_update', [ClientMasterController::class, 'update'])->name('clientmaster_update');

// Job Training Certificate Master
Route::get('/jobTrainiCertificateList', [JobTrainiCertificateController::class, 'index'])->name('jobTrainiCertificateList');
Route::post('/jobTrainiCertificateList', [JobTrainiCertificateController::class, 'index'])->name('jobTrainiCertificateList');
Route::get('/addjobTrainiCertificate', [JobTrainiCertificateController::class, 'create'])->name('addjobTrainiCertificate');
Route::post('/savejobTrainiCertificate', [JobTrainiCertificateController::class, 'save'])->name('savejobTrainiCertificate');
Route::get('/editjobTrainiCertificate/{id?}', [JobTrainiCertificateController::class, 'edit'])->name('editjobTrainiCertificate');
Route::post('/editjobTrainiCertificate/{id?}', [JobTrainiCertificateController::class, 'Update'])->name('editjobTrainiCertificate');
Route::get('/jobTrainiCertificateActive', [JobTrainiCertificateController::class, 'jobTrainiCertificateActive'])->name('jobTrainiCertificateActive');
Route::get('/jobTrainiCertificateDeactive', [JobTrainiCertificateController::class, 'jobTrainiCertificateDeactive'])->name('jobTrainiCertificateDeactive');
Route::get('/jobTrainiCertificateDelete/{id?}', [JobTrainiCertificateController::class, 'jobTrainiCertificateDelete'])->name('jobTrainiCertificateDelete');

// Award Certificate Master
Route::get('/awardCertificateList', [AwardCertificateController::class, 'index'])->name('awardCertificateList');
Route::get('/addAwardCertificate', [AwardCertificateController::class, 'create'])->name('addAwardCertificate');
Route::post('/saveAwardCertificate', [AwardCertificateController::class, 'save'])->name('saveAwardCertificate');
Route::get('/awardCertificateDelete/{id?}', [AwardCertificateController::class, 'awardCertificateDelete'])->name('awardCertificateDelete');

// Basic Pay Master
Route::get('/basicPayList', [BasicPayController::class, 'index'])->name('basicPayList');
Route::post('/basicPayList', [BasicPayController::class, 'index'])->name('basicPayList');
Route::get('/AddBasicPay', [BasicPayController::class, 'create'])->name('AddBasicPay');
Route::post('/saveBasicPay', [BasicPayController::class, 'save'])->name('saveBasicPay');
Route::get('/basicPayEdit/{id?}', [BasicPayController::class, 'Edit'])->name('basicPayEdit');
Route::get('/basicpay_activate', [BasicPayController::class, 'deactivate'])->name('basicpay_activate');
Route::get('/basicpay_deactivate', [BasicPayController::class, 'activate'])->name('basicpay_deactivate');
Route::post('/updateBasicPay/{id?}', [BasicPayController::class, 'update'])->name('updateBasicPay');

/*User*/
Route::get('/user_list', [UserController::class, 'index'])->name('user_list');
Route::post('/user_list', [UserController::class, 'index'])->name('user_list');
Route::get('/user_create', [UserController::class, 'create'])->name('user_create');
Route::post('/user_save', [UserController::class, 'save'])->name('user_save');
Route::get('/user_edit/{id?}', [UserController::class, 'userEdit'])->name('user_edit');
Route::post('/user_edit/{id?}', [UserController::class, 'userUpdate'])->name('user_edit');
Route::get('/user_activate', [UserController::class, 'deactivate'])->name('user_activate');
Route::get('/user_deactivate', [UserController::class, 'activate'])->name('user_deactivate');
Route::get('/Usergetdata', [UserController::class, 'Usergetdata'])->name('Usergetdata');
Route::get('/Userget_promotionyr', [UserController::class, 'Userget_promotionyr'])->name('Userget_promotionyr');
Route::post('/user_CertificateAdd/{id?}', [UserController::class, 'user_CertificateAdd'])->name('user_CertificateAdd');
Route::get('/certificate_delete/{id?}', [UserController::class, 'certificate_delete'])->name('certificate_delete');
Route::get('/certificateEdit', [UserController::class, 'certificateEdit'])->name('certificateEdit');
Route::get('/user_certificationList', [CertificationController::class, 'index'])->name('user_certificationList');
Route::post('/user_certificationList', [CertificationController::class, 'index'])->name('user_certificationList');
Route::post('/user_bankAdd/{id?}', [UserController::class, 'user_bankAdd'])->name('user_bankAdd');
Route::get('/Uncheckout_List', [UserController::class, 'Uncheckout_List'])->name('Uncheckout_List');
Route::get('/StaffimportList', [UserController::class, 'StaffimportList'])->name('StaffimportList');
Route::post('/StaffImport', [UserController::class, 'StaffImport'])->name('StaffImport');
Route::get('/StaffExport',[UserController::class,'StaffExport'])->name('StaffExport');
Route::get('/DeleteImportStaff',[UserController::class,'DeleteImportStaff'])->name('DeleteImportStaff');
Route::get('/InsertImportStaff',[UserController::class,'InsertImportStaff'])->name('InsertImportStaff');

Route::post('/saveAwardCertificate/{id?}', [UserController::class, 'award_save'])->name('saveAwardCertificate');

Route::get('/awardCertificateDelete/{id?}', [UserController::class, 'awardCertificateDelete'])->name('awardCertificateDelete');
Route::get('/userActivity_List', [UserController::class, 'userActivity_List'])->name('userActivity_List');
Route::get('/userActivity_edit/{id?}', [UserController::class, 'userActivity_edit'])->name('userActivity_edit');


// Additional Duty
Route::get('/additional_DutyList', [AdditionalDutyController::class, 'index'])->name('additional_DutyList');
Route::post('/additional_DutyList', [AdditionalDutyController::class, 'index'])->name('additional_DutyList');
Route::get('/additional_Dutyadd', [AdditionalDutyController::class, 'create'])->name('additional_Dutyadd');
Route::post('/additional_Dutysave', [AdditionalDutyController::class, 'save'])->name('additional_Dutysave');
Route::get('/additional_Dutyedit/{id?}', [AdditionalDutyController::class, 'edit'])->name('additional_Dutyedit');
Route::post('/additional_Dutyedit/{id?}', [AdditionalDutyController::class, 'update'])->name('additional_Dutyedit');
Route::get('/additional_DutyDelete/{id?}', [AdditionalDutyController::class, 'additional_DutyDelete'])->name('additional_DutyDelete');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'index'])->name('home');
Route::post('/getDutyList', [HomeController::class, 'getDutyList'])->name('getDutyList');

Route::get('/web_menu_list', [RoleController::class, 'index'])->name('web_menu_list');
Route::get('/create_web_menu', [RoleController::class, 'create'])->name('create_web_menu');
Route::get('/save_web_menu', [RoleController::class, 'create'])->name('save_web_menu');
Route::post('/save_web_menu', [RoleController::class, 'store'])->name('save_web_menu');
Route::get('/edit_web_menu/{id?}', [RoleController::class, 'edit'])->name('edit_web_menu');
Route::post('/edit_web_menu/{id?}', [RoleController::class, 'update'])->name('edit_web_menu');


Route::get('/mobile_menu_list', [RoleController::class, 'mobile_menu_list'])->name('mobile_menu_list');
Route::get('/edit_mobile_menu/{id?}', [RoleController::class, 'editMobileMenu'])->name('edit_mobile_menu');
Route::post('/edit_mobile_menu/{id?}', [RoleController::class, 'updateMobileMenu'])->name('edit_mobile_menu');
Route::post('/saveMobileMenu', [RoleController::class, 'savemobilePermission'])->name('saveMobileMenu');
Route::get('/AddMobileMenu/{id?}', [RoleController::class, 'AddMobileMenu'])->name('AddMobileMenu');


/*Security Company*/
Route::get('/security_company_list', [SecurityCompanyController::class, 'index'])->name('security_company_list');
Route::post('/security_company_list', [SecurityCompanyController::class, 'index'])->name('security_company_list');
Route::get('/security_company_create', [SecurityCompanyController::class, 'securityCompanyCreate'])->name('security_company_create');
Route::post('/security_company_save', [SecurityCompanyController::class, 'securityCompanySave'])->name('security_company_save');
Route::get('/security_company_activate', [SecurityCompanyController::class, 'deactivate'])->name('security_company_activate');
Route::get('/security_company_deactivate', [SecurityCompanyController::class, 'activate'])->name('security_company_deactivate');
Route::get('/security_company_edit/{id?}', [SecurityCompanyController::class, 'securityCompanyEdit'])->name('security_company_edit');
Route::post('/security_company_edit/{id?}', [SecurityCompanyController::class, 'securityCompanyUpdate'])->name('security_company_edit');

/*Security Company Setting*/
Route::get('/company_setting_list', [CompanySettingController::class, 'index'])->name('company_setting_list');
Route::post('/company_setting_list', [CompanySettingController::class, 'index'])->name('company_setting_list');
Route::get('/company_setting_create', [CompanySettingController::class, 'companySettingCreate'])->name('company_setting_create');
Route::post('/company_setting_save', [CompanySettingController::class, 'companySettingSave'])->name('company_setting_save');
Route::get('/company_setting_activate', [CompanySettingController::class, 'deactivate'])->name('company_setting_activate');
Route::get('/company_setting_deactivate', [CompanySettingController::class, 'activate'])->name('company_setting_deactivate');
Route::get('/company_setting_edit/{id?}', [CompanySettingController::class, 'companySettingEdit'])->name('company_setting_edit');
Route::post('/company_setting_edit/{id?}', [CompanySettingController::class, 'companySettingUpdate'])->name('company_setting_edit');

/*Senior Security Officer*/
Route::get('/senior_security_officer_list', [SeniorSecurityOfficerController::class, 'index'])->name('senior_security_officer_list');
Route::post('/senior_security_officer_list', [SeniorSecurityOfficerController::class, 'index'])->name('senior_security_officer_list');
Route::get('/senior_security_officer_create', [SeniorSecurityOfficerController::class, 'create'])->name('senior_security_officer_create');
Route::post('/senior_security_officer_save', [SeniorSecurityOfficerController::class, 'save'])->name('senior_security_officer_save');
Route::get('/senior_security_officer_edit/{id?}', [SeniorSecurityOfficerController::class, 'seniorSecurityOfficeEdit'])->name('senior_security_officer_edit');
Route::post('/senior_security_officer_edit/{id?}', [SeniorSecurityOfficerController::class, 'seniorSecurityOfficeUpdate'])->name('senior_security_officer_edit');
Route::get('/senior_security_officer_activate', [SeniorSecurityOfficerController::class, 'deactivate'])->name('senior_security_officer_activate');
Route::get('/senior_security_officer_deactivate', [SeniorSecurityOfficerController::class, 'activate'])->name('senior_security_officer_deactivate');


/*Security Group*/
Route::get('/security_group_list', [SecurityGroupController::class, 'index'])->name('security_group_list');
Route::post('/security_group_list', [SecurityGroupController::class, 'index'])->name('security_group_list');
Route::get('/security_group_create', [SecurityGroupController::class, 'create'])->name('security_group_create');
Route::post('/security_group_save', [SecurityGroupController::class, 'save'])->name('security_group_save');
Route::get('/security_group_edit/{id?}', [SecurityGroupController::class, 'seniorSecurityOfficeEdit'])->name('security_group_edit');
Route::post('/security_group_edit/{id?}', [SecurityGroupController::class, 'seniorSecurityOfficeUpdate'])->name('security_group_edit');
Route::get('/security_group_activate', [SecurityGroupController::class, 'deactivate'])->name('security_group_activate');
Route::get('/security_group_deactivate', [SecurityGroupController::class, 'activate'])->name('security_group_deactivate');


/*Security Officer*/
Route::get('/security_officer_list', [SecurityOfficerController::class, 'index'])->name('security_officer_list');
Route::post('/security_officer_list', [SecurityOfficerController::class, 'index'])->name('security_officer_list');
Route::get('/security_officer_create', [SecurityOfficerController::class, 'create'])->name('security_officer_create');
Route::post('/security_officer_save', [SecurityOfficerController::class, 'save'])->name('security_officer_save');
Route::get('/security_officer_edit/{id?}', [SecurityOfficerController::class, 'seniorSecurityOfficeEdit'])->name('security_officer_edit');
Route::post('/security_officer_edit/{id?}', [SecurityOfficerController::class, 'seniorSecurityOfficeUpdate'])->name('security_officer_edit');
Route::get('/security_officer_activate', [SecurityOfficerController::class, 'deactivate'])->name('security_officer_activate');
Route::get('/security_officer_deactivate', [SecurityOfficerController::class, 'activate'])->name('security_officer_deactivate');




/*Property*/
Route::get('/property_list', [PropertyController::class, 'index'])->name('property_list');
Route::post('/property_list', [PropertyController::class, 'index'])->name('property_list');
Route::get('/property_create', [PropertyController::class, 'propertyCreate'])->name('property_create');
Route::post('/property_save', [PropertyController::class, 'propertySave'])->name('property_save');
Route::get('/property_activate', [PropertyController::class, 'deactivate'])->name('property_activate');
Route::get('/property_deactivate', [PropertyController::class, 'activate'])->name('property_deactivate');
Route::get('/property_edit/{id?}', [PropertyController::class, 'propertyEdit'])->name('property_edit');
Route::post('/property_edit/{id?}', [PropertyController::class, 'propertyUpdate'])->name('property_edit');
Route::post('/property_location/{id?}', [PropertyController::class, 'propertyLocationUpdate'])->name('property_location');
Route::post('/property_officers/{id?}', [PropertyController::class, 'propertyOfficers'])->name('property_officers');
Route::post('/psm_add/{id?}', [PropertyController::class, 'psmAdd'])->name('psm_add');
Route::post('/cso_add/{id?}', [PropertyController::class, 'csoAdd'])->name('cso_add');
Route::post('/cso_edit/{id?}', [PropertyController::class, 'csoEdit'])->name('cso_edit');
Route::post('/psm_edit/{id?}', [PropertyController::class, 'psmEdit'])->name('psm_edit');
Route::get('/psm_delete/{id?}', [PropertyController::class, 'psmDelete'])->name('psm_delete');
Route::get('/cso_delete/{id?}', [PropertyController::class, 'csoDelete'])->name('cso_delete');
Route::get('/getClientData', [PropertyController::class, 'getClient_Data'])->name('getClientData');
Route::post('/propertyclient_add/{id?}', [PropertyController::class, 'propertyClientUpdate'])->name('propertyclient_add');
Route::get('/propertyQrcode/{id?}', [PropertyController::class, 'propertyQrcode'])->name('propertyQrcode');



// SEASONAL WORKERS

	Route::get('/seasonalWorkersList', [SeasonalWorkersController::class, 'index'])->name('seasonalWorkersList');
	Route::post('/seasonalWorkersList', [SeasonalWorkersController::class, 'index'])->name('seasonalWorkersList');
	Route::get('/addSeasonalWorkers', [SeasonalWorkersController::class, 'create'])->name('addSeasonalWorkers');
	Route::post('/saveSeasonalWorkers', [SeasonalWorkersController::class, 'save'])->name('saveSeasonalWorkers');
	Route::get('/editSeasonalWorkers/{id?}', [SeasonalWorkersController::class, 'edit'])->name('editSeasonalWorkers');
	Route::get('/activeSeasonalWorkers', [SeasonalWorkersController::class, 'activeSeasonalWorkers'])->name('activeSeasonalWorkers');
	Route::get('/deactiveSeasonalWorkers', [SeasonalWorkersController::class, 'deactiveSeasonalWorkers'])->name('deactiveSeasonalWorkers');

// END

// INCIDENT MANAGEMENT incidentstatus_update
	Route::get('/incidentNotificationList', [IncidentManagementController::class, 'index'])->name('incidentNotificationList');
	Route::post('/incidentNotificationList', [IncidentManagementController::class, 'index'])->name('incidentNotificationList');
	Route::get('/incidentNotificationView', [IncidentManagementController::class, 'show'])->name('incidentNotificationView');
	Route::get('/investigationReportList', [IncidentManagementController::class, 'investigationReportList'])->name('investigationReportList');
	Route::post('/investigationReportList', [IncidentManagementController::class, 'investigationReportList'])->name('investigationReportList');
	Route::get('/investigationReportUpdate', [IncidentManagementController::class, 'investigationReportUpdate'])->name('investigationReportUpdate');
	Route::get('/investigationReportSave', [IncidentManagementController::class, 'save'])->name('investigationReportSave');
	Route::get('/investigationReportView', [IncidentManagementController::class, 'investigationReportView'])->name('investigationReportView');
	Route::get('/investigationReportPdf/{id?}', [IncidentManagementController::class, 'investigationReportPdf'])->name('investigationReportPdf');
	Route::get('/investigationReportDashboard', [IncidentManagementController::class, 'investigationReportDashboard'])->name('investigationReportDashboard');

	Route::get('/investigationReportDashboard', [IncidentManagementController::class, 'investigationReportDashboard'])->name('investigationReportDashboard');


        Route::get('/incidentList', [IncidentManagementController::class, 'incidentList'])->name('incidentList');
        Route::post('/incidentList', [IncidentManagementController::class, 'incidentList'])->name('incidentList');
        Route::get('/incidentadd', [IncidentManagementController::class, 'incidentAdd'])->name('incidentadd');
        Route::post('/incident_save', [IncidentManagementController::class, 'incident_insert'])->name('incident_save');
        Route::post('/incident_edit', [IncidentManagementController::class, 'incident_update'])->name('incident_edit');
        Route::post('/incidentstatus_update', [IncidentManagementController::class, 'incidentstatus_update'])->name('incidentstatus_update');
        Route::get('/incidentNotificationEdit/{id?}', [IncidentManagementController::class, 'edit'])->name('incidentNotificationEdit');
        Route::get('/incidentNotificationpdf/{id?}', [IncidentManagementController::class, 'incidentNotificationpdf'])->name('incidentNotificationpdf');


// END

// PROFILE
	Route::get('/profileView', [ProfileController::class, 'index'])->name('profileView');
	Route::post('/updateProfile', [ProfileController::class, 'update'])->name('updateProfile');
	Route::get('/resetPasswordView', [ProfileController::class, 'resetPasswordView'])->name('resetPasswordView');
	Route::post('/UpdatePassword', [ProfileController::class, 'UpdatePassword'])->name('UpdatePassword');
// END

// ATTENDANCE REPORT
	Route::get('/attendanceReportList', [AttendanceManagementController::class, 'index'])->name('attendanceReportList');
	Route::get('/attendanceReportView', [AttendanceManagementController::class, 'attendanceReportView'])->name('attendanceReportView');
    Route::post('/saveRemarkHistory', [AttendanceManagementController::class, 'saveRemarkHistory'])->name('saveRemarkHistory');
    Route::get('/attendanceReportExport', [AttendanceManagementController::class, 'attendanceReportExport'])->name('attendanceReportExport');
// END

// ON/OFFDUTY
	Route::get('/onDutyList', [DutyController::class, 'index'])->name('onDutyList');
	Route::post('/onDutyList', [DutyController::class, 'index'])->name('onDutyList');
	Route::get('/onDutyView', [DutyController::class, 'onDutyView'])->name('onDutyView');
	Route::get('/offDutyList', [DutyController::class, 'offDutyList'])->name('offDutyList');
	Route::post('/offDutyList', [DutyController::class, 'offDutyList'])->name('offDutyList');
	Route::post('/duty_report', [DutyController::class, 'dutyReprot'])->name('duty_report');
	Route::get('/duty_report', [DutyController::class, 'dutyReprot'])->name('duty_report');
// END

// INCIDENT Category
	Route::get('/incidentCategoryList', [IncidentCategoryController::class, 'incidentCategory'])->name('incidentCategoryList');
	Route::post('/incidentCategoryList', [IncidentCategoryController::class, 'incidentCategory'])->name('incidentCategoryList');
	Route::get('/incident_category', [IncidentCategoryController::class, 'incident_category'])->name('incident_category');
	Route::post('/incidentCategorySave', [IncidentCategoryController::class, 'save'])->name('incidentCategorySave');
	Route::post('/editIncidentCategory', [IncidentCategoryController::class, 'edit'])->name('editIncidentCategory');
	Route::get('/deactiveIncidentCategory', [IncidentCategoryController::class, 'deactiveIncidentCategory'])->name('deactiveIncidentCategory');
	Route::get('/activeIncidentCategory', [IncidentCategoryController::class, 'activeIncidentCategory'])->name('activeIncidentCategory');
	Route::get('/destroyIncidentCategory', [IncidentCategoryController::class, 'delete'])->name('destroyIncidentCategory');
// END

//Shift Master
	Route::get('/shift_list', [ShiftController::class, 'index'])->name('shift_list');
	Route::get('/shift_list/edit/{id?}', [ShiftController::class, 'editShift'])->name('shift_list/edit');
	Route::get('/shift_list/add', [ShiftController::class, 'addShift'])->name('shift_list/add');
	Route::post('/shift_list/add', [ShiftController::class, 'saveShift'])->name('shift_list/add');
	Route::post('/shift_list/edit/{id?}', [ShiftController::class, 'updateShift'])->name('shift_list/edit');
        Route::get('/shift_activate', [ShiftController::class, 'deactivate'])->name('shift_activate');
        Route::get('/shift_deactivate', [ShiftController::class, 'activate'])->name('shift_deactivate');


        Route::get('/shift_time_slot_list', [ShiftController::class, 'shiftTimeSlotList'])->name('shift_time_slot_list');
        Route::get('/shift_time_slot_list/add/{id?}', [ShiftController::class, 'shiftTimeSlotAdd'])->name('shift_time_slot_list/add');
        Route::post('/add_time_slot/add/{id?}', [ShiftController::class, 'saveTimeSlot'])->name('add_time_slot/add');
        Route::post('/add_time_slot_break/add/{id?}', [ShiftController::class, 'breakUpdate'])->name('add_time_slot_break/add');

//End shift master

//        / BLOCK AND UNITS
	// BLOCk
	Route::get('/block_list', [BlockAndUnitsController::class, 'blockList'])->name('block_list');
	Route::post('/block_list', [BlockAndUnitsController::class, 'blockList'])->name('block_list');
	Route::get('/company_block_bulk_upload', [BlockAndUnitsController::class, 'companydoBlockBulkUpload'])->name('company_block_bulk_upload');
	Route::post('/company_block_save', [BlockAndUnitsController::class, 'companyBlockSave'])->name('company_block_save');
	Route::post('/company_block_update', [BlockAndUnitsController::class, 'companyBlockUpdate'])->name('company_block_update');
	Route::post('/get_block_data', [BlockAndUnitsController::class, 'getBlockData'])->name('get_block_data');
	Route::get('/company_block_delete', [BlockAndUnitsController::class, 'companyBlockDelete'])->name('company_block_delete');
	Route::get('/company_block_activate', [BlockAndUnitsController::class, 'companyBlockActivate'])->name('company_block_activate');
	Route::get('/company_block_deactivate', [BlockAndUnitsController::class, 'companyBlockDeactivate'])->name('company_block_deactivate');
	// END

	// UNIT
	Route::get('/unit_list', [BlockAndUnitsController::class, 'unitList'])->name('unit_list');
	Route::post('/unit_list', [BlockAndUnitsController::class, 'unitList'])->name('unit_list');
	Route::post('/company_unit_save', [BlockAndUnitsController::class, 'companyUnitSave'])->name('company_unit_save');
	Route::post('/company_unit_update', [BlockAndUnitsController::class, 'companyUnitUpdate'])->name('company_unit_update');
	Route::post('/get_unit_data', [BlockAndUnitsController::class, 'getUnitData'])->name('get_unit_data');
	Route::get('/company_unit_bulk_upload', [BlockAndUnitsController::class, 'companyUnitBulkUpload'])->name('company_unit_bulk_upload');
	Route::get('/company_unit_delete', [BlockAndUnitsController::class, 'companyUnitDelete'])->name('company_unit_delete');
	Route::get('/company_unit_activate', [BlockAndUnitsController::class, 'companyUnitActivate'])->name('company_unit_activate');
	Route::get('/company_unit_deactivate', [BlockAndUnitsController::class, 'companyUnitDeactivate'])->name('company_unit_deactivate');
	// END
// END

        /*Checklist Start*/
        Route::get('/check_points_list', [CheckpointController::class, 'index'])->name('check_points_list');
        Route::get('/check_points/add', [CheckpointController::class, 'newCheckPoint'])->name('check_points/add');
        Route::get('/check_points/edit/{id?}', [CheckpointController::class, 'editCheckPoint'])->name('check_points/edit');
        Route::post('/check_points/update/{id?}', [CheckpointController::class, 'updateCheckPoint'])->name('check_points/update');
        Route::get('/check_points/pdf/{id?}', [CheckpointController::class, 'checkPointPdf'])->name('check_points/pdf');
        Route::get('/check_points/pdf/data/{id?}', [CheckpointController::class, 'checkPointPdf'])->name('check_points/pdf/data');
        Route::post('/check_points/save', [CheckpointController::class, 'saveNewCheckPoint'])->name('check_points/save');
        Route::get('/checkpoints_activate', [CheckpointController::class, 'deactivate'])->name('checkpoints_activate');
        Route::get('/checkpoints_deactivate', [CheckpointController::class, 'activate'])->name('checkpoints_deactivate');


        Route::get('/check_lists', [ChecklistController::class, 'index'])->name('check_lists');
        Route::get('/check_lists/add', [ChecklistController::class, 'newChecklist'])->name('check_lists/add');
        Route::get('/check_lists/edit/{id?}', [ChecklistController::class, 'editChecklist'])->name('check_lists/edit');
        Route::get('/manage_checkist', [ChecklistController::class, 'manageChecklist'])->name('manage_checkist');
        Route::post('/manage_checkist', [ChecklistController::class, 'manageChecklist'])->name('manage_checkist');
        Route::get('/manage_checkist_view/{id?}', [ChecklistController::class, 'manageCheckView'])->name('manage_checkist_view');
        Route::get('/checklist_report/{id?}', [ChecklistController::class, 'checklistReport'])->name('checklist_report');
        Route::get('/manage_shift_wise_checkist', [ChecklistController::class, 'manageShiftWiseCheckList'])->name('manage_shift_wise_checkist');
        Route::post('/manage_shift_wise_checkist', [ChecklistController::class, 'manageShiftWiseCheckList'])->name('manage_shift_wise_checkist');
        Route::get('/manage_patrol_wise_checkist/{id?}/{shift?}/{date?}', [ChecklistController::class, 'manageShiftPatrolCheckList'])->name('manage_patrol_wise_checkist');
        Route::post('/manage_patrol_wise_checkist/{id?}/{shift?}/{date?}', [ChecklistController::class, 'manageShiftPatrolCheckList'])->name('manage_patrol_wise_checkist');
        Route::get('/manage_checkist_new/{id?}/{shift?}/{patrol_type?}/{date?}', [ChecklistController::class, 'manageChecklistNew'])->name('manage_checkist_new');
        Route::post('/manage_checkist_new/{id?}/{shift?}/{patrol_type?}/{date?}', [ChecklistController::class, 'manageChecklistNew'])->name('manage_checkist_new');

        Route::resource('me_check_list', PhotoController::class);



        Route::post('/checklist/save', [ChecklistController::class, 'saveCheckList'])->name('checklist/save');
        Route::post('/checklist/update/{id?}', [ChecklistController::class, 'updateCheckList'])->name('checklist/update');
        Route::post('/get_ajax_checklists', [ChecklistController::class, 'getAjaxChecklists'])->name('get_ajax_checklists');
        Route::get('/delete_checklist', [ChecklistController::class, 'deleteCheckList'])->name('delete_checklist');

        /*Checklist end*/



        /*Check list cron */
        Route::get('/create_check_list', [CronController::class, 'createCronCheckList'])->name('create_check_list');
        Route::get('/create_check_list_expiry', [CronController::class, 'expiryCheckpoints'])->name('create_check_list_expiry');



        /*Schedule */
        Route::get('/manage_schedule', [ScheduleController::class, 'manageSchedules'])->name('manage_schedule');
        Route::any('/cso_manage_schedule', [ScheduleController::class, 'csoManageSchedules'])->name('csoManageSchedule');
        Route::post('/manage_schedule', [ScheduleController::class, 'manageSchedules'])->name('manage_schedule');
        Route::post('/schedule_update', [ScheduleController::class, 'schedulesUpdate'])->name('schedule_update');
        Route::post('/schedule_delete', [ScheduleController::class, 'deleteSchedule'])->name('schedule_delete');
        Route::get('/manage_schedule_list', [ScheduleController::class, 'scheduleList'])->name('manage_schedule_list');
        Route::post('/manage_schedule_list', [ScheduleController::class, 'scheduleList'])->name('manage_schedule_list');
        Route::post('/schedule_type', [ScheduleController::class, 'schedulesType'])->name('schedule_type');
        Route::post('/assign_job', [ScheduleController::class, 'assignNewJob'])->name('assign_job');
        Route::post('/assign_adhoc_job', [ScheduleController::class, 'assignAdhocJob'])->name('assign_adhoc_job');
        Route::post('/reassign_job', [ScheduleController::class, 'reassignJob'])->name('reassign_job');
        Route::post('/schedule_clone', [ScheduleController::class, 'scheduleClone'])->name('schedule_clone');
        Route::post('/ajax_schedule_events', [ScheduleController::class, 'getScheduleCalendorAjaxEvents'])->name('ajax_schedule_events');
        Route::post('/ajax_schedule_events_color', [ScheduleController::class, 'getScheduleCalendorAjaxBackgroundColor'])->name('ajax_schedule_events_color');
        Route::post('/ajax_get_schedule_dates', [ScheduleController::class, 'getAjaxScheduleDates'])->name('ajax_get_schedule_dates');
        Route::post('/submit_schedule_dates', [ScheduleController::class, 'submitScheduleDates'])->name('submit_schedule_dates');
        Route::post('/check_schedule_property', [ScheduleController::class, 'checkScheduleProperty'])->name('check_schedule_property');
        Route::post('/check_adhoc_job', [ScheduleController::class, 'checkAdhocJob'])->name('check_adhoc_job');
        Route::get('/schedule_limit_lables', [ScheduleController::class, 'scheduleLimitLables'])->name('schedule_limit_lables');
        Route::get('/schedule_property_lables/{id?}', [ScheduleController::class, 'schedulePropertyLables'])->name('schedule_property_lables');
        Route::post('/schedule_property_lables/{id?}', [ScheduleController::class, 'saveLables'])->name('schedule_property_lables');
        Route::post('/update_schedule_property_lables/{id?}', [ScheduleController::class, 'updateLables'])->name('update_schedule_property_lables');
        Route::post('/date_schedule', [ScheduleController::class, 'dateSchedule'])->name('date_schedule');
        Route::post('/delete_schedule', [ScheduleController::class, 'deleteSchedules'])->name('delete_schedule');
        Route::post('/automate_schedule', [ScheduleController::class, 'automateSchedule'])->name('automate_schedule');
        Route::post('/check_shifttime', [ScheduleController::class, 'checkShiftTime'])->name('check_shifttime');

        Route::post('/check_cso_schedule_property', [ScheduleController::class, 'checkCsoScheduleProperty'])->name('check_cso_schedule_property');
        Route::post('/submit_cso_schedule_dates', [ScheduleController::class, 'submitCsoScheduleDates'])->name('submit_cso_schedule_dates');
        Route::post('/ajax_cso_get_schedule_dates', [ScheduleController::class, 'getCsoAjaxScheduleDates'])->name('ajax_cso_get_schedule_dates');
        Route::post('/ajax_cso_schedule_events_color', [ScheduleController::class, 'getCsoScheduleCalendorAjaxBackgroundColor'])->name('ajax_cso_schedule_events_color');
        Route::post('/ajax_cso_schedule_events', [ScheduleController::class, 'getCsoScheduleCalendorAjaxEvents'])->name('ajax_cso_schedule_events');
        Route::post('/cso_date_schedule', [ScheduleController::class, 'csoDateSchedule'])->name('cso_date_schedule');
        Route::post('/delete_cso_schedule', [ScheduleController::class, 'deleteCsoSchedules'])->name('delete_cso_schedule');
        Route::any('/cso_schedule_list', [ScheduleController::class, 'csoScheduleList'])->name('cso_schedule_list');
        Route::any('/cso_schedule_limit_lables', [ScheduleController::class, 'csoScheduleLimitLables'])->name('cso_schedule_limit_lables');
        Route::get('/cso_schedule_property_lables/{id?}', [ScheduleController::class, 'CsoschedulePropertyLables'])->name('cso_schedule_property_lables');
        Route::post('/cso_schedule_property_lables/{id?}', [ScheduleController::class, 'CsoSaveLables'])->name('cso_schedule_property_lables');
        Route::post('/cso_update_schedule_property_lables/{id?}', [ScheduleController::class, 'CsoUpdateLables'])->name('cso_update_schedule_property_lables');
        Route::post('/saveManuelAjaxScheduleDates', [ScheduleController::class, 'saveManuelAjaxScheduleDates'])->name('saveManuelAjaxScheduleDates');
        Route::post('/updateReSchedulejob', [ScheduleController::class, 'updateReSchedulejob'])->name('updateReSchedulejob');

        /*Schedule */

         /*Schedule Copy*/
        Route::get('/manage_schedule_copy', [ScheduleControllerCopy::class, 'manageSchedules'])->name('manage_schedule_copy');
        Route::post('/manage_schedule_copy', [ScheduleControllerCopy::class, 'manageSchedules'])->name('manage_schedule_copy');
        Route::post('/schedule_update_copy', [ScheduleControllerCopy::class, 'schedulesUpdate'])->name('schedule_update_copy');
        Route::post('/schedule_delete_copy', [ScheduleControllerCopy::class, 'deleteSchedule'])->name('schedule_delete_copy');
        Route::get('/manage_schedule_list_copy', [ScheduleControllerCopy::class, 'scheduleList'])->name('manage_schedule_list_copy');
        Route::post('/manage_schedule_list_copy', [ScheduleControllerCopy::class, 'scheduleList'])->name('manage_schedule_list_copy');
        Route::post('/schedule_type_copy', [ScheduleControllerCopy::class, 'schedulesType'])->name('schedule_type_copy');
        Route::post('/assign_job_copy', [ScheduleControllerCopy::class, 'assignNewJob'])->name('assign_job_copy');
        Route::post('/assign_adhoc_job_copy', [ScheduleControllerCopy::class, 'assignAdhocJob'])->name('assign_adhoc_job_copy');
        Route::post('/reassign_job_copy', [ScheduleControllerCopy::class, 'reassignJob'])->name('reassign_job_copy');
        Route::post('/schedule_clone_copy', [ScheduleControllerCopy::class, 'scheduleClone'])->name('schedule_clone_copy');
        Route::post('/ajax_schedule_events_copy', [ScheduleControllerCopy::class, 'getScheduleCalendorAjaxEvents'])->name('ajax_schedule_events_copy');
        /*Schedule Copy*/


        Route::get('/adhoc_jobs', [AdhocJobs::class, 'index'])->name('adhoc_jobs');
        Route::post('/save_adhoc_job', [AdhocJobs::class, 'saveAdhocJob'])->name('save_adhoc_job');
        Route::get('/adhoc_job_add', [AdhocJobs::class, 'adhocJobAdd'])->name('adhoc_job_add');
        Route::get('/adhoc_job_view/{id?}', [AdhocJobs::class, 'adhocJobView'])->name('adhoc_job_view');
        Route::get('/adhoc_job_edit/{id?}', [AdhocJobs::class, 'adhocJobEdit'])->name('adhoc_job_edit');
        Route::post('/adhoc_job_off_duty_list', [AdhocJobs::class, 'adhocOffDutyList'])->name('adhoc_job_off_duty_list');



        /*Checkpoint Patrol Settings*/
        Route::get('/property_patrol_settings', [CheckpointController::class, 'checkPointPatrolSettingsList'])->name('property_patrol_settings');
        Route::get('/property_patrol_settings/{id?}', [CheckpointController::class, 'patrolSettings'])->name('property_patrol_settings');
        Route::post('/property_patrol_settings/{id?}', [CheckpointController::class, 'patrolSettingsUpdate'])->name('property_patrol_settings');
        Route::post('/update_patrol_settings', [CheckpointController::class, 'updatePatrolSettings'])->name('update_patrol_settings');
        Route::get('/generate', [HomeController::class, 'generate'])->name('generate');



        /*My Adhoc jobs*/
        Route::get('/property_patrol_settings', [CheckpointController::class, 'checkPointPatrolSettingsList'])->name('property_patrol_settings');

/*VMS*/
        Route::get('/vehicle_reg_list', [WalkInRegistrationList::class, 'vehicleRegList'])->name('vehicle_reg_list');
        Route::get('/walkin_reg_list', [WalkInRegistrationList::class, 'walkinRegList'])->name('walkin_reg_list');
        Route::post('/walkin_reg_list', [WalkInRegistrationList::class, 'walkinRegList'])->name('walkin_reg_list');
        Route::post('/vehicle_reg_list', [WalkInRegistrationList::class, 'vehicleRegList'])->name('vehicle_reg_list');

        /*Hrs Management*/
        Route::get('/applicantForm', [HrsManagementController::class, 'applicantForm'])->name('applicantForm');
        Route::get('/applicantForm_edit/{id?}', [HrsManagementController::class, 'applicantForm_edit'])->name('applicantForm_edit');
        Route::get('/appointments', [HrsManagementController::class, 'appointments'])->name('appointments');
        Route::get('/appointment_view/{id?}', [HrsManagementController::class, 'appointment_view'])->name('appointment_view');
        Route::get('/appointment_pdfview/{id?}', [HrsManagementController::class, 'appointment_pdfview'])->name('appointment_pdfview');
        Route::get('/appointment_pdfviewapp/{id?}', [HrsManagementController::class, 'appointment_pdfviewapp'])->name('appointment_pdfviewapp');
        Route::get('/employeeTraining_view/{id?}', [HrsManagementController::class, 'employeeTraining_view'])->name('employeeTraining_view');
        Route::get('/employeeTraining', [HrsManagementController::class, 'employeeTraining'])->name('employeeTraining');
        Route::get('/sendnotification', [HomeController::class, 'sendnotification'])->name('sendnotification');
        Route::get('/Uncheckout_List', [UserController::class, 'Uncheckout_List'])->name('Uncheckout_List');
        Route::get('/incidentadd', [IncidentManagementController::class, 'incidentAdd'])->name('incidentadd');
        Route::post('/saveAppointment', [HrsManagementController::class, 'saveAppointment'])->name('saveAppointment');
        Route::get('/appointment_addview', [HrsManagementController::class, 'appointment_addview'])->name('appointment_addview');
        Route::post('/SaveEmployeeTraining', [HrsManagementController::class, 'SaveEmployeeTraining'])->name('SaveEmployeeTraining');
        Route::get('/employeeTraining_addview', [HrsManagementController::class, 'employeeTraining_addview'])->name('employeeTraining_addview');
        Route::get('/employeeTraining_pdfview/{id?}', [HrsManagementController::class, 'employeeTraining_pdfview'])->name('employeeTraining_pdfview');
        Route::get('/employeeTraining_pdfviewapp/{id?}', [HrsManagementController::class, 'employeeTraining_pdfviewapp'])->name('employeeTraining_pdfviewapp');
        Route::post('/jobapplication_edit/{id?}', [HrsManagementController::class, 'UpdateapplicantDeatils'])->name('jobapplication_edit');
        Route::get('/ShortList_Applicant', [HrsManagementController::class, 'ShortList_Applicant'])->name('ShortList_Applicant');
        Route::any('/pre_appointments', [HrsManagementController::class, 'pre_appointments'])->name('pre_appointments');
        Route::any('/PreEmployementVerfiyStatus/{id?}', [HrsManagementController::class, 'PreEmployementVerfiyStatus'])->name('PreEmployementVerfiyStatus');
        Route::get('/editPreEmployement/{id?}', [HrsManagementController::class, 'editPreEmployement'])->name('editPreEmployement');
        Route::post('/updatePreEmployement/{id?}', [HrsManagementController::class, 'updatePreEmployement'])->name('updatePreEmployement');
        Route::post('/saveAppointmentForm', [JobApplicationController::class, 'saveAppointmentForm'])->name('saveAppointmentForm');
        Route::any('/appointementVerfiyStatus/{id?}', [HrsManagementController::class, 'appointementVerfiyStatus'])->name('appointementVerfiyStatus');
        Route::any('/editAppointment/{id?}', [HrsManagementController::class, 'editAppointment'])->name('editAppointment');
        Route::any('/updateAppointment/{id?}', [HrsManagementController::class, 'updateAppointment'])->name('updateAppointment');
        Route::any('/employeeAppointment_pdfview/{id?}', [HrsManagementController::class, 'appointment_pdfview'])->name('employeeAppointment_pdfview');

       

        /*Hrs Management*/


        Route::get('/incidentadd', [IncidentManagementController::class, 'incidentAdd'])->name('incidentadd');
        Route::post('/incidentstatus_update', [IncidentManagementController::class, 'incidentstatus_update'])->name('incidentstatus_update');
        Route::get('/incidentNotificationEdit/{id?}', [IncidentManagementController::class, 'edit'])->name('incidentNotificationEdit');
        Route::get('/incidentNotificationpd/{id?}', [IncidentManagementController::class, 'incidentNotificationpdf'])->name('incidentNotificationpdf');

        Route::post('/jobapplication_edit/{id?}', [HrsManagementController::class, 'UpdateapplicantDeatils'])->name('jobapplication_edit');
        Route::get('/ShortList_Applicant', [HrsManagementController::class, 'ShortList_Applicant'])->name('ShortList_Applicant');

        // me_manage_shift_wise_checkist
        Route::resource('me_check_list', MecheckListController::class);

        Route::get('/me_checklist_delete/{id?}', [App\Http\Controllers\MecheckListController::class, 'me_checklist_delete'])->name('me_checklist_delete');
        Route::any('/me_manage_checkist', [App\Http\Controllers\MecheckListController::class, 'meManageCheckist'])->name('me_manage_checkist');
        Route::any('/me_acknowledge_manage_checkist', [App\Http\Controllers\MecheckListController::class, 'meAcknowledgeManageCheckist'])->name('me_acknowledge_manage_checkist');
        Route::post('/me_acknowledge_manage_data', [App\Http\Controllers\MecheckListController::class, 'meAcknowledgementData'])->name('me_acknowledge_manage_data');
        Route::any('/pdfTemplate', [HrsManagementController::class, 'pdfTemplate'])->name('pdfTemplate');
        Route::any('/addTemplate', [HrsManagementController::class, 'addTemplate'])->name('addTemplate');
        Route::any('/editPdfTemplate/{id?}', [HrsManagementController::class, 'editPdfTemplate'])->name('editPdfTemplate');
        Route::any('/savePdfTemplate', [HrsManagementController::class, 'savePdfTemplate'])->name('savePdfTemplate');
        // Route::get('/me_manage_shift_wise_checkist', [IncidentManagementController::class, 'incidentNotificationpdf'])->name('incidentNotificationpdf');


        // Duty Master
Route::get('/dutyTypeList', [DutyTypeController::class, 'index'])->name('dutyTypeList');
Route::post('/dutyTypeSave', [DutyTypeController::class, 'save'])->name('dutyTypeSave');
Route::get('/dutyTypeEdit', [DutyTypeController::class, 'edit'])->name('dutyTypeEdit');
Route::get('/dutyTypeActive', [DutyTypeController::class, 'dutyTypeActive'])->name('dutyTypeActive');
Route::get('/dutyTypeDeactive', [DutyTypeController::class, 'dutyTypeDeactive'])->name('dutyTypeDeactive');
Route::post('/dutyTypeUpdate', [DutyTypeController::class, 'update'])->name('dutyTypeUpdate');

//Occurence Book
Route::get('/occurenceBookList', [OccurrenceController::class, 'index'])->name('occurenceBookList');
Route::post('/occurenceBookList', [OccurrenceController::class, 'index'])->name('occurenceBookList');

// Occurence Subject Master
Route::get('/occurenceSubjectList', [OccurrenceSubjectController::class, 'occurenceSubject'])->name('occurenceSubjectList');
Route::post('/occurenceSubjectList', [OccurrenceSubjectController::class, 'occurenceSubject'])->name('occurenceSubjectList');
Route::post('/occurenceSubjectSave', [OccurrenceSubjectController::class, 'save'])->name('occurenceSubjectSave');
Route::get('/occurenceSubjectEdit', [OccurrenceSubjectController::class, 'edit'])->name('occurenceSubjectEdit');
Route::get('/occurenceSubjectActive', [OccurrenceSubjectController::class, 'Active'])->name('occurenceSubjectActive');
Route::get('/occurenceSubjectDeactive', [OccurrenceSubjectController::class, 'Deactive'])->name('occurenceSubjectDeactive');
Route::get('/occurenceSubjectUpdate', [OccurrenceSubjectController::class, 'update'])->name('occurenceSubjectUpdate');
