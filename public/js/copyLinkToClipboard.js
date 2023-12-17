function copyLinkToClipboard(link, btn) {
    navigator.clipboard.writeText(link);
    backup = btn.innerHTML;
    btn.innerHTML = "Lien copié";
  }
