(()=>{"use strict";var e={};(e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})})(e);const t=window.wc.tracks,i=document.querySelector("#addtag #submit");function n(e){const i=e.target.parentElement.classList[0],n={edit:"edit",inline:"quick_edit",delete:"delete",view:"preview"};n[i]&&(0,t.recordEvent)("product_attributes_term_list_action_click",{selected_action:n[i]})}function c(){document.querySelectorAll(".row-actions span").forEach((e=>{e.removeEventListener("click",n),e.addEventListener("click",n)}))}c(),null==i||i.addEventListener("click",(function(){(0,t.recordEvent)("product_attributes_add_term",{page:"tags"}),setTimeout((()=>{c()}),1e3)})),(window.wc=window.wc||{}).addTermTracking=e})();