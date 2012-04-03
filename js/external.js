function ext_new_action(event) {
try {
var b=document.getElementsByTagName("a");
for (var i = 0; i < b.length; i++) {
if (!(b[i].title)) {
b[i].title=extremoveHTMLTags(b[i].innerHTML);
}
if (b[i] && b[i].href && b[i].href.toLowerCase().indexOf('http://')!=-1 && (b[i].target==null || b[i].target=='')) {
if (b[i].hostname && location.hostname) {
if ((b[i].hostname != location.hostname)) {
b[i].target="_blank";
}
} else {
if (b[i].href && (b[i].href.indexOf('www.var hn = window.location.hostname;') < 0)) {
b[i].target="_blank";
}
}
}
}
} catch (ee) {}
}
if (document.addEventListener) {
document.addEventListener("DOMContentLoaded", function(event) { ext_new_action(event); }, false);
} else if (window.attachEvent) {
window.attachEvent("onload", function(event) { ext_new_action(event); });
} else {
var oldFunc = window.onload;
window.onload = function() {
if (oldFunc) {
oldFunc();
}
ext_new_action('load');
};
}
function extremoveHTMLTags(ihtml){
try {
ihtml = ihtml.replace(/&(lt|gt);/g, function (strMatch, p1){
return (p1 == "lt")? "<" : ">";
});
return ihtml.replace(/<\/?[^>]+(>|$)/g, "");
} catch (eee) {
return '';
}
}
function externalLinks() {
if (!document.getElementsByTagName) return;
var anchors = document.getElementsByTagName("a");
for (var i=0; i<anchors.length; i++) {
var anchor = anchors[i];
if (anchor.getAttribute("href") &&
anchor.getAttribute("rel") == "external")
anchor.target = "_blank";
}
}
window.onload = externalLinks;