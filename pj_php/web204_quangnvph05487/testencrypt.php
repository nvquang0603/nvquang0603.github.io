<?PHP
	$regExAddress = '/^[a-zA-ZàáảãạăắẳặâấậèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụỳýỷỹỵÀÁẢÃẠĂẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤỲÝỶỸỴ ]+$/u';
	$address = 'Mỹ Đình';
	echo preg_match($regExAddress, $address);	
?>