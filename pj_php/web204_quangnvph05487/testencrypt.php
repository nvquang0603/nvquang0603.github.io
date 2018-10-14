<?PHP
	$regExAddress = '/^[a-zA-Z0-9đàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ,.-]+$/u';
	$address = 'Số 2, Nguyễn Cơ Thạch, ktx Mỹ đình, name từ liêm, hà nội @#@$#';
	echo preg_match($regExAddress, $address);	
?>