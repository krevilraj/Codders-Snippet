<section id="about">
  <div class="container">
    <div class="section-title h2 text-center mb-5">
      <h2 class="mb-0">Instant Template</h2>
      <span class="title-letter">T</span>
    </div>
    <div class="row">
      <h3 class="col-md-12">Template with one Variable</h3>
      <div class="col-md-6" id="add_snippet">
        <form role="form" id="template_form1">
          <div class="form-group error-text-white">
            <input type="text" id="var1" name="email" value="" placeholder="Enter your Variable1" class="form-control required ">
          </div>
          <div id="template_form">
            <button type="submit" class="btn btn-xs btn-light btn-pill">Submit</button>
            <button id="reset1" class="btn btn-xs btn-light btn-pill">Reset</button>
            <button id="btn_var1" class="btn btn-xs btn-light btn-pill">Variable1</button>
          </div>

        </form>
        <textarea id="users_template1" cols="55" rows="10"></textarea>
      </div>
      <div class="col-md-6">
        <h4>Result</h4>
        <pre class="language-markup">
          <code id="result1"></code>
        </pre>
      </div>
    </div>
    <div class="row">

      <h3 class="col-md-12" style="margin-top: 16px">Template with two Variable</h3>
      <div class="col-md-6">
        <form role="form" id="template_form2">
          <div class="form-group error-text-white">
            <input type="text" id="var2" name="email" value="" placeholder="Enter your Variable1" class="form-control required ">
          </div>
          <div class="form-group error-text-white">
            <input type="text" id="var3" name="email" value="" placeholder="Enter your Variable2" class="form-control required ">
          </div>
          <button type="submit" class="btn btn-xs btn-light btn-pill">Submit</button>
          <button id="reset2" class="btn btn-xs btn-light btn-pill">Reset</button>
          <button id="btn_var2" class="btn btn-xs btn-light btn-pill">Variable1</button>
          <button id="btn_var3" class="btn btn-xs btn-light btn-pill">Variable2</button>
        </form>
        <textarea id="users_template2" cols="55" rows="10"></textarea>
      </div>
      <div class="col-md-6">
        <h4>Result</h4>
        <pre class="language-markup">
          <code id="result2"></code>
        </pre>
      </div>
    </div>
  </div>
</section>
@push('styles')
  <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}" type="text/css">
  <style>
    #template_form {
      display: flex;
      justify-content: space-between;
    }
    #template_form textarea{
      width:100%;
    }
  </style>

@endpush
@push('scripts')
  <script src="{{asset('backend/prism/prism.js')}}"></script>
  <script src="{{asset('backend/rangyinputs-jquery-src.js')}}"></script>
  <script>
    $("#template_form1").on("submit", function (e) {
      e.preventDefault();
      var user_template = $('#users_template1');
      var template = user_template.val();
      if (template != "" && template != undefined) {
        var variable1 = $('#var1').val();
        var res = $('#result1').text();
        res += "\n" + template.replace(/\^variable1\^/g, variable1);
        $('#result1').text(res.trim());
        // $('#result1').append($("\n" + template.replace(/\^variable1\^/g, variable1)));
        $('#var1').val("").focus();
        console.log(res.trim());
      } else {
        alert("Enter the template first");
      }
      return false;
    });

    $("#template_form2").on("submit", function (e) {
      e.preventDefault();
      var user_template = $('#users_template2');
      var template = user_template.val();
      if (template != "" && template != undefined) {
        var variable2 = $('#var2').val();
        var variable3 = $('#var3').val();
        var res = $('#result2').text();
        var temp = "";
        temp = template.replace(/\^variable1\^/g, variable2);
        temp = temp.replace(/\^variable2\^/g, variable3);
        res += "\n" + temp;

        $('#result2').text(res.trim());
        $('#var2').val("").focus();
        $('#var3').val("");
      } else {
        alert("Enter the template first");
      }
      return false;
    });

    $("#reset1").on("click", function (e) {
      e.preventDefault();
      $('#result1').html("");
      $('#var1').val("").focus();
    });
    $("#reset2").on("click", function (e) {
      e.preventDefault();
      $('#result2').html("");
      $('#var2').val("").focus();
      $('#var3').val("");
    });

    $("#btn_var1").on("click", function (e) {
      e.preventDefault();
      var extracted = $("#users_template1").extractSelectedText();
      if (extracted === "" || extracted === undefined) {
        alert('Please select in the text');
      } else {
        $("#users_template1").replaceSelectedText("^variable1^");
      }

    });
    $("#btn_var2").on("click", function (e) {
      e.preventDefault();
      var extracted = $("#users_template2").extractSelectedText();
      if (extracted === "" || extracted === undefined) {
        alert('Please select in the text');
      } else {
        $("#users_template2").replaceSelectedText("^variable1^");
      }
    });
    $("#btn_var3").on("click", function (e) {
      e.preventDefault();
      var extracted = $("#users_template2").extractSelectedText();
      if (extracted === "" || extracted === undefined) {
        alert('Please select in the text');
      } else {
        $("#users_template2").replaceSelectedText("^variable2^");
      }
    });

  </script>
@endpush