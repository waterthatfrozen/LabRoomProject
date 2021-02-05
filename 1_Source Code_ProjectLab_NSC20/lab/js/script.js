function changeFunc() {
	var category = document.getElementById("category");
	var ValueCategory = category.options[category.selectedIndex].value;
	//alert(selectedValue);
	location.href = 'borrow.php?c=' + ValueCategory;
}

function changeFunc2() {
	var lab_category = document.getElementById("lab_category");
	var ValueCategory = lab_category.options[lab_category.selectedIndex].value;
	//alert(selectedValue);
	location.href = 'equip_pack.php?id=' + ValueCategory;
	//alert(ValueCategory);
}

function myFunction(eq_id) {
	//alert(eq_id);
    var x;
    var name=prompt("โปรดรุะบุจำนวน","0");
    if (name!=null){
	  // x = parseInt(name);
       x=name;
      alert(x);
	  location.href = 'borrow_submit.php?a=' + x + '&eq_id=' + eq_id;
   }
}

function myFunction2(cart_id) {
	//alert(eq_id);
    var x;
    var name=prompt("โปรดรุะบุจำนวน","0");
    if (name!=null){
	  // x = parseInt(name);
       x=name;
     // alert(cart_id);
	  location.href = 'edit_cart.php?a='+x+'&cart_id='+ cart_id;

   }
}

