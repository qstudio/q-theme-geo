document.addEventListener("load", function() {
  var embedded = inIframe();

  if (embedded) {
    var adminBar = document.getElementById("wpadminbar");
    if (adminBar) adminBar.remove();
    document.documentElement.style.setProperty(
      "margin-top",
      "0px",
      "important"
    );
  }
});

function inIframe() {
  try {
    return window.self !== window.top;
  } catch (e) {
    console.log("Problem hiding Wordpress Admin bar");
    return false;
  }

  return false;
}
