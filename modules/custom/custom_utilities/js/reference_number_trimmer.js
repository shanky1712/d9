(function ($, Drupal) {

    jQuery("#edit-mail").on('change', function() {
      var email = this.value;
      jQuery("#edit-name").val(email);
    });

    // Initiate the Drupal autocomplete made in core/misc/autocomplete.js
    var autocomplete = Drupal.autocomplete;

    var selectedItemsWithRefId = [];
    var selectedItemsWithoutRefIds = [];
    /**
     * Handles an autocomplete select event.
     */
    function selectHandlerCustom(event, ui) {
      selectedItemsWithoutRefIds = autocomplete.splitValues(event.target.value);
      selectedItemsWithoutRefIds.pop();

      /**
       * ui.item.label -> contains the item name without the reference id
       * ui.item.value -> contains the item name with the reference id
       */
      var str = removeTags(ui.item.label);
      selectedItemsWithoutRefIds.push(str);
      selectedItemsWithRefId.push({ label: str, value: ui.item.value });
      
      /* change the value of autoselect widget to display the selectedItemsWithoutRefsIds */
      event.target.value = selectedItemsWithoutRefIds.join(', ');
      return false;
    }

    // Override the select handler initiated in core/misc/autocomplete.js
    // Drupal.autocomplete.options.select = selectHandlerCustom;

    /*
    * Before submitting the form, we replace the autocomplete widget values with items that contain reference id
    */
    // $("#FORM_ID").submit(function() {
    //     // we filter out those items that the user may have removed
    //   var selectedItems = selectedItemsWithRefId
    //     .filter(function(item){
    //       return selectedItemsWithoutRefIds.includes(item.label);
    //       console.log(item.label);
    //   }) .map(function(item){
    //     return item.value
    //     console.log(item.value);
    //     });

    //   if(selectedItemsWithRefId.length) {
    //     $("#WIDGET_FIELD_ID").val(selectedItemsWithRefId.join(","))
    //   }
    // })
  })(jQuery, Drupal);

 function removeTags(str) {
  if ((str===null) || (str===''))
  return false;
  else
  str = str.toString();
  return str.replace( /(<([^>]+)>)/ig, '');
}