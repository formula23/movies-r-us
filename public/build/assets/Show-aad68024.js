import{_ as c}from"./AppLayout-1ca8043d.js";import p from"./DeleteUserForm-dad86339.js";import l from"./LogoutOtherBrowserSessionsForm-910ddffc.js";import{S as s}from"./SectionBorder-afeb8b8a.js";import f from"./TwoFactorAuthenticationForm-191e905d.js";import u from"./UpdatePasswordForm-3b8a9b9a.js";import _ from"./UpdateProfileInformationForm-819f81a9.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-296b5acc.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-ff30e6cb.js";import"./SectionTitle-551778c4.js";import"./DangerButton-5c507cf9.js";import"./InputError-44291ee5.js";import"./SecondaryButton-0a587801.js";import"./TextInput-a4cf8e74.js";import"./ActionMessage-062bb081.js";import"./PrimaryButton-502c08a9.js";import"./InputLabel-80938d59.js";import"./FormSection-cea106d5.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},G={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{G as default};