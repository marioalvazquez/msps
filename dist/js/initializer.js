"use strict";$(document).ready(function(){$.get("shared/styles.html",function(e){$("head").append(e),$.get("shared/footer.html",function(e){$("body").append(e),$.get("shared/header.html",function(e){$("body").prepend(e)})})})});