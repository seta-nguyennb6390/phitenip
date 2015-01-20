// スマホ・タブレットのURLバー隠し
window.onload = function() {
setTimeout(scrollTo, 100, 0, 1);
}

// スムーズ・スクロール 
$(function() {
  $(".scroll").click(function () {
    $('html,body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });
});

// ポップアップ｜カレンダー用（400×400）
function cal_win(url,winname) {
    var features = "width=400, height=400, menubar=no, toolbar=no, scrollbars=yes";
    window.open(url,winname,features);
}

// ポップアップ｜設定用｜横長（500×400）
function set_win(url,winname) {
    var features = "width=500, height=400, menubar=no, toolbar=no, scrollbars=yes";
    window.open(url,winname,features);
}

// ポップアップ｜設定用｜縦長（500×600）
function set_win_L(url,winname) {
    var features = "width=500, height=600, menubar=no, toolbar=no, scrollbars=yes";
    window.open(url,winname,features);
}