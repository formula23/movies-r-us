import{T as m,d,o as c,e as u,b as e,u as a,w as r,F as p,Z as f,a as o,n as _,g as w,i as g}from"./app-3cf17716.js";import{A as b,_ as h}from"./AuthenticationCardLogo-709be5ad.js";import{_ as x}from"./InputError-3aa585a4.js";import{_ as v}from"./InputLabel-c96c83c1.js";import{_ as y}from"./PrimaryButton-c92ca647.js";import{_ as V}from"./TextInput-15a00899.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=o("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),$={class:"flex justify-end mt-4"},j={__name:"ConfirmPassword",setup(k){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(A,i)=>(c(),u(p,null,[e(a(f),{title:"Secure Area"}),e(b,null,{logo:r(()=>[e(h)]),default:r(()=>[C,o("form",{onSubmit:g(n,["prevent"])},[o("div",null,[e(v,{for:"password",value:"Password"}),e(V,{id:"password",ref_key:"passwordInput",ref:t,modelValue:a(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>a(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),e(x,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),o("div",$,[e(y,{class:_(["ms-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{j as default};