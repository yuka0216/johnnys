// // id="inputGroupFile"の要素の内容を取得し その要素でchangeイベントが発生したら関数を実行する
// document.getElementById("inputGroupFile").addEventListener("change", function() {
//     // 選択されたファイルの最初のファイルのデータを変数fileに代入する
//     let file = this.files[0];
//     // class="custom-file-label"の要素の内容を取得し その内容の最初のオブジェクトの文章をfile.nameで書き替える
//     document.getElementsByClassName("custom-file-label")[0].innerHTML = file.name;
// }, false);

$(function() {
    $('#inputGroupFile').on('change', function() {
        let file = $(this).prop('files')[0];
        $('.custom-file-label').text(file.name);
    });
});