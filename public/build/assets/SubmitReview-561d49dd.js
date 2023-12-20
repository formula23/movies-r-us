import{T as _,o as i,e as l,a as o,i as b,b as a,K as w,P as h,u as s,F as m,h as x,w as c,c as y,t as k,g as d,j as S}from"./app-b0dc5b2b.js";import{_ as R}from"./PrimaryButton-a5013bec.js";import{_ as V}from"./TextArea-d33f1967.js";import{_ as u}from"./InputError-bfffbacb.js";import{_ as p}from"./InputLabel-f6af2ead.js";const $=o("h2",{class:"text-2xl mb-2"},"Submit Review",-1),B={class:"relative max-w-full bg-white rounded overflow-hidden shadow-lg mb-12"},j={class:"p-4"},F={class:"col-span-6 sm:col-span-4"},N=["value"],z={class:"col-span-6 sm:col-span-4"},U={__name:"SubmitReview",props:{movie:Object},setup(f){const v=f,e=_({rating:1,comment:""}),g=n=>{e.post(route("movies.reviews.store",v.movie),{errorBag:"createReview",preserveScroll:!0,onSuccess:()=>{e.reset()}})};return(n,r)=>(i(),l(m,null,[$,o("div",B,[o("div",j,[n.$page.props.auth.user?(i(),l("form",{key:0,onSubmit:b(g,["prevent"]),class:"space-y-2"},[o("div",F,[a(p,{for:"rating",value:"Rating"}),w(o("select",{"onUpdate:modelValue":r[0]||(r[0]=t=>s(e).rating=t),class:"w-1/8 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100"},[(i(),l(m,null,x(10,t=>o("option",{key:t,value:t},k(t),9,N)),64))],512),[[h,s(e).rating]]),a(u,{message:s(e).errors.rating,class:"mt-2"},null,8,["message"])]),o("div",z,[a(p,{for:"comment",value:"Review"}),a(V,{id:"comment",modelValue:s(e).comment,"onUpdate:modelValue":r[1]||(r[1]=t=>s(e).comment=t),onFocus:r[2]||(r[2]=t=>s(e).clearErrors("comment")),type:"text",class:"mt-1 block w-full h-32",required:""},null,8,["modelValue"]),a(u,{message:s(e).errors.comment,class:"mt-2"},null,8,["message"])]),a(R,{disabled:s(e).processing,class:"justify-center mt-2"},{default:c(()=>[d(" Submit Review ")]),_:1},8,["disabled"])],32)):(i(),y(s(S),{key:1,class:"inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest",href:n.route("login")},{default:c(()=>[d("Login to Submit Review")]),_:1},8,["href"]))])])],64))}};export{U as default};