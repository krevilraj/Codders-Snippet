var Index = {

  suggestions: [],

  init: function () {
    Index.bindEvents();
    $('#getNewSuggestionsButton1').click();
    Index.initCkEditor();
  },

  bindEvents: function () {
    $('#getNewSuggestionsButton1').on('click', function () {
      Index.getSuggestionsFromServer('/dashboard/get-suggestion');
    });

    $('#getNewSuggestionsButton2').on('click', function () {
      Index.getSuggestionsFromServer('/dashboard/get-suggestion');
    });
  },

  initCkEditor: function () {
    //Here "CKEDITOR.SHIFT + 51" is the key combination for '#'
    $('textarea#ckeditorBox').ckeditor({suggestionsTriggerKey: {keyCode: CKEDITOR.SHIFT + 51}});
    CKEDITOR.on('instanceReady', function (evt) {
      //Here 'Index.suggestions' is the Array which is holding the current list of suggestions
      CKEDITOR.instances.ckeditorBox.execCommand('reloadSuggetionBox', Index.suggestions);
    });
  },

  getSuggestionsFromServer: function (url) {
    Index.suggestions = [];

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var data = {'query': 'model'};
    Index.ajaxCall(url, data, Index.getSuggestionsFromServerCallback);
  },

  getSuggestionsFromServerCallback: function (response) {

    var myArray = [];
    myArray = response.suggestions;
    console.log(myArray.length);
    $.each(myArray, function (index, sugggestion) {
      console.log(sugggestion.label);
      Index.suggestions.push({
        "id": sugggestion.id,
        "label": sugggestion.label
      });
    });
    CKEDITOR.instances.ckeditorBox.execCommand('reloadSuggetionBox', Index.suggestions);
  },

  ajaxCall: function (urlForAjax, dataForAjax, successCallBack) {

    $.ajax({
      type: 'POST',
      url: urlForAjax,
      data: dataForAjax,
      contentType: "application/json",
      dataType: "json",
      success: function (response) {
        if (response !== null) {
          successCallBack(response);
        } else {
          alert("Unable to get a response from the server.");
        }
      },
      error: function () {
        alert("Experiencing problems connecting to the server.");
      }
    });
  }


}