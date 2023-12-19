import{T as g,k as p,o as r,e as l,b as e,u as t,w as o,F as h,Z as _,f as y,a as s,n as v,g as n,j as u,i as x}from"./app-296b5acc.js";import{A as b,_ as k}from"./AuthenticationCardLogo-692300ed.js";import{_ as w}from"./PrimaryButton-502c08a9.js";import"./_plugin-vue_export-helper-c27b6911.js";const V=s("div",{class:"mb-4 text-sm text-gray-600"}," Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),E={key:0,class:"mb-4 font-medium text-sm text-green-600"},B={class:"mt-4 flex items-center justify-between"},F={__name:"VerifyEmail",props:{status:String},setup(c){const d=c,i=g({}),f=()=>{i.post(route("verification.send"))},m=p(()=>d.status==="verification-link-sent");return(a,C)=>(r(),l(h,null,[e(t(_),{title:"Email Verification"}),e(b,null,{logo:o(()=>[e(k)]),default:o(()=>[V,m.value?(r(),l("div",E," A new verification link has been sent to the email address you provided in your profile settings. ")):y("",!0),s("form",{onSubmit:x(f,["prevent"])},[s("div",B,[e(w,{class:v({"opacity-25":t(i).processing}),disabled:t(i).processing},{default:o(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),s("div",null,[e(t(u),{href:a.route("profile.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:o(()=>[n(" Edit Profile")]),_:1},8,["href"]),e(t(u),{href:a.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2"},{default:o(()=>[n(" Log Out ")]),_:1},8,["href"])])])],32)]),_:1})],64))}};export{F as default};
