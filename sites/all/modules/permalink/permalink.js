// $Id: permalink.js,v 1.1 2009/03/18 01:54:50 toddnienkerk Exp $

function fnSelect(objId) {
  fnDeSelect();
  if (document.selection) 
  {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(objId));
    range.select();
  }
  else if (window.getSelection) 
  {
    var range = document.createRange();
    range.selectNode(document.getElementById(objId));
    window.getSelection().addRange(range);
  }
}

function fnDeSelect() {
if (document.selection)
  document.selection.empty();
else if (window.getSelection)
  window.getSelection().removeAllRanges();
}
