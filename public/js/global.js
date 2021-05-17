$(document).ready(function () {
	$('#combobox1').multipleSelect();
	$('#combobox2').multipleSelect();
	$('#create').show("slide", 600);
	$('#index').fadeTo( 0 , 0);
	$('#index').fadeTo( "slow" , 1);
	$('.messages.success').effect("highlight",1000);
	resizeNav("parent","nav","footer");
	
	$( "#sockets_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		revert: 150,
		update: function(){
		    var sortedIDs = $('#sockets_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_sockets: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#sockets_sortable" ).disableSelection();
	
	$( "#instructionsets_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		revert: 150,
		update: function(){
		    var sortedIDs = $('#instructionsets_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_instructionsets: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#instructionsets_sortable" ).disableSelection();
	
	$( "#microarchitectures_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		revert: 150,
		update: function(){
		    var sortedIDs = $('#microarchitectures_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_microarchitectures: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#microarchitectures_sortable" ).disableSelection();
	
	$( "#families_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		revert: 150,
		update: function(){
		    var sortedIDs = $('#families_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_families: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#families_sortable" ).disableSelection();
	
	$( "#cores_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		update: function(){
		    var sortedIDs = $('#cores_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_cores: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#cores_sortable" ).disableSelection();

	$( "#microprocessors_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		update: function(){
		    var sortedIDs = $('#microprocessors_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_microprocessors: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#microprocessors_sortable" ).disableSelection();

	$( "#serialnumbers_sortable" ).sortable({
		appendTo: document.body,
		axis: "y",
		opacity: 0.7,
		update: function(){
		    var sortedIDs = $('#serialnumbers_sortable').sortable('toArray'); 
			$.ajax({
				data: {sort_serialnumbers: sortedIDs},
				type: 'POST',
				url: '/cpu/index.php',
				success: function(){
					//alert(sortedIDs);
				}
			});
		}
	});
	$( "#serialnumbers_sortable" ).disableSelection();
	
	$('#cores_dragtable').dragtable();
	$('#cores_dragtable').dragtable('order', [ 'model' , 'microarchitecture' , 'family' , 'manufacturer' , 'cores' , 'l1_cache' , 'l2_cache' , 'l3_cache' , 'transistors' , 'datasheet' , 'instructionsets' ]);
	
	$('#microprocessors_dragtable').dragtable();
	$('#microprocessors_dragtable').dragtable('order', [ 'model' , 'core' , 'core_speed' , 'bus_speed' , 'clock_multiplier' , 'core_voltage' , 'io_voltage' , 'tdp' , 'intro_date' , 'smp_process' , 'speedsys_benchmark' , 'doom_benchmark']);

	$('#serialnumbers_dragtable').dragtable();
	$('#serialnumbers_dragtable').dragtable('order', [ 'top_picture' , 'other_picture' , 'microprocessor' , 'part_number' , 'fpo_number' , 'package' , 'socket', 'tested', 'note' ]);

	$('.cpu-img').hoverpulse({
		size: 90
	});
});

$(window).on('resize', function() {
	resizeNav("parent","nav","footer");
});

function resizeNav(parent,nav,footer) {
	var objParent = document.getElementById(parent);
	var objNav = document.getElementById(nav);
	var objFooter = document.getElementById(footer);
	var parentHeight = objParent.scrollHeight;
	var footerHeight = objFooter.scrollHeight;
	objNav.style.height = parentHeight-footerHeight+"px";
}	

// ######################################################

function refreshForm(oForm, firstElement, id, list) { 

	updateAnimation();
	
	var tab = list.split("|#|");
	
	var lastElement = tab.length + firstElement;
	
	var tabindex = 0;
	
	oForm.elements[2].value = id;
	// On parcourt les éléments du formulaire
	for (var index = firstElement; index < lastElement; index++) {
		frmElement = oForm.elements[index];
		
		if (frmElement.nodeName === "SELECT") {
			for(var opt = 0, len = frmElement.options.length; opt < len; ++opt) {
				if(frmElement.options[opt].innerHTML === tab[tabindex]) {
					frmElement.selectedIndex = opt;
					break;
				}
			}
		}
		else {
			frmElement.value = tab[tabindex];
		}
		tabindex++;
	}
}

// ######################################################

function submitForm(oForm, type, name) {

	value = oForm.elements[name].value.trim();
	if (value != "") {
		document.getElementById(oForm.submit());
	}
	else if (type =='create') {
		$('.messages').hide();
		$('#create').hide();
		$("#index").fadeTo( 0 , 0);
		$('.messages.error').effect("shake",50);
		$('#create').show("slide", 600);
	}
	else if (type =='update') {
		$('.messages').hide();
		$('#update').hide();
		$("#index").fadeTo( 0 , 0);
		$('.messages.error').effect("shake",50);
		$('#update').show("slide", 600);
	}
	$("#index").fadeTo( "slow" , 1, function() {
		resizeNav("parent","nav","footer"); 
	});
}

// ######################################################

function refreshMicroArchitectureForm(oForm, firstElement, id, list) { 

	updateAnimation();
	
	var tab = list.split("|#|");
	
	var lastElement = tab.length + firstElement;
	
	var tabindex = 0;
	
	oForm.elements[2].value = id;
	// On parcourt les éléments du formulaire
	for (var index = firstElement; index < lastElement; index++) {
		frmElement = oForm.elements[index];
		// architecture
		if (frmElement.id === "combobox4") {
			var dropUpdate = document.getElementsByClassName('ms-drop')[1].children[0];
			var  lenOpt = dropUpdate.childElementCount-2;
			for(var opt = 0; opt <= lenOpt; ++opt) {
				var node = dropUpdate.childNodes[opt];
				var nodeText = node.textContent;
				node.lastChild.childNodes[0].checked = false;
				if (nodeText === tab[tabindex]) {
					node.lastChild.childNodes[0].checked = true;
						
					frmElement.childNodes[2*opt+1].selected = true;
						
					var valueUpdate = document.getElementsByClassName('ms-choice')[1].children[0];
					valueUpdate.innerHTML = nodeText;	
				}
			}	
		}
		else {
			frmElement.value = tab[tabindex];
		}
		tabindex++;
	}
}

// ######################################################

function refreshCoreForm(oForm, firstElement, id, list) { 

	updateAnimation();
	
	var tab = list.split("|#|");
	
	var lastElement = tab.length + firstElement;
	
	var tabindex = 0;
	
	oForm.elements[2].value = id;
	// On parcourt les éléments du formulaire
	for (var index = firstElement; index <= lastElement; index++) {
		frmElement = oForm.elements[index];
		if (frmElement.id === "update-placeholder-datasheet") {
			if (tab[tabindex] !== "") {
				frmElement.placeholder = tab[tabindex];
			}
			else {
				frmElement.placeholder = "PDF file";
			}
		}
		else if (frmElement.id === "update-file-datasheet") {
			tabindex--;
		}
		else if (frmElement.nodeName === "SELECT") {
			// instructionset
			if (frmElement.id === "combobox2") {
			
				var listIs = tab[tabindex].replace(/,\s/g,',');
				var tabinstructionset = listIs.split(",");
				var lenIs = tabinstructionset.length;
				
				var dropUpdate = document.getElementsByClassName('ms-drop')[7].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				var value = "";
				
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (opt === 0) {
						if (lenIs === lenOpt) {
							node.lastChild.childNodes[0].checked = true;
							value = "All selected";
						}
					}
					for (var instructionset = 0; instructionset < lenIs; ++instructionset) {
						var is = tabinstructionset[instructionset];
						if (nodeText === tabinstructionset[instructionset]) {
							node.lastChild.childNodes[0].checked = true;
							frmElement.childNodes[opt].selected = true;
							if (value !== "All selected") {
								if (value === "")  {
									value = nodeText;
								}
								else {
									value = value+ ', '+nodeText;
								}
							}
						}
					}
				}			
				var valueUpdate = document.getElementsByClassName('ms-choice')[7].children[0];
				valueUpdate.innerHTML = value;
			}
			// manufacturer
			else if (frmElement.id === "combobox4") {

				var dropUpdate = document.getElementsByClassName('ms-drop')[4].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
							
						frmElement.childNodes[2*opt+1].selected = true;
							
						var valueUpdate = document.getElementsByClassName('ms-choice')[4].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
			// microarchitecture
			else if (frmElement.id === "combobox6") {
				
				var dropUpdate = document.getElementsByClassName('ms-drop')[5].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
							
						frmElement.childNodes[opt+1].selected = true;
							
						var valueUpdate = document.getElementsByClassName('ms-choice')[5].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
			// family
			else if (frmElement.id === "combobox8") {
				
				var dropUpdate = document.getElementsByClassName('ms-drop')[6].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
							
						frmElement.childNodes[opt+1].selected = true;
							
						var valueUpdate = document.getElementsByClassName('ms-choice')[6].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
			else {
				for(var opt = 0, len = frmElement.options.length; opt < len; ++opt) {
					if(frmElement.options[opt].innerHTML === tab[tabindex]) {
						frmElement.selectedIndex = opt;
						break;
					}
				}
			}
		}
		else {
			frmElement.value = tab[tabindex];
		}
		tabindex++;
	}
}

// ######################################################

function submitCoreForm(oForm, type, name, file, maxSize, ext) {
	var submit = 1;
	var error = document.getElementsByClassName('messages error')[0].innerHTML;
	var reg = new RegExp("<p>.*</p>","g");
	trimmedName = oForm.elements[name].value.trim();
	
	if (document.getElementById(file).files.length !== 0) {
		var uploadedFile = document.getElementById(file);
		var fileSize = uploadedFile.files[0].size;
		var fileExt = uploadedFile.files[0].type;
		fileExt = fileExt.split("/");
		fileExt = fileExt[1];
	}
	else {
		fileSize = 0;
		fileExt = ext;
	}
	// bug mime firefox
	if (fileExt === "octet-stream") {
		fileExt = ext;
	}
	if (trimmedName === "") {
		submit = 0;
		error = error.replace(reg,"<p>Core Name is empty!</p>");
	}
	else if (fileSize > maxSize) {
		submit = 0;
		error = error.replace(reg,"<p>Datasheet file size ("+(fileSize/1024/1024).toFixed(2)+" Mo) exceeds the allowable limit ("+(maxSize/1024/1024).toFixed(2)+" Mo)!</p>");
	}
	else if (fileExt !== ext) {
		submit = 0;
		error = error.replace(reg,"<p>Datasheet file does not match the ."+ext+" file extension!</p>");
	}	
	// Submit si OK
	if (submit === 1) {
		document.getElementById(oForm.submit());
	}
	else {
		document.getElementsByClassName('messages error')[0].innerHTML = error;
		if (type ==='create'){
			$('.messages').hide();
			$('#create').hide();
			$("#index").fadeTo( 0 , 0);
			$('.messages.error').effect("shake",50);
			$('#create').show("slide", 600);
		}
		else if (type ==='update'){
			$('.messages').hide();
			$('#update').hide();
			$("#index").fadeTo( 0 , 0);
			$('.messages.error').effect("shake",50);
			$('#update').show("slide", 600);
		}
		$("#index").fadeTo( "slow" , 1, function() {
			resizeNav("parent","nav","footer"); 
		});
	}
}

// ######################################################

function refreshMicroProcessorForm(oForm, firstElement, id, list) { 

	updateAnimation();
	
	var tab = list.split("|#|");
	
	var lastElement = tab.length + firstElement;
	
	var tabindex = 0;
	
	oForm.elements[2].value = id;
	// On parcourt les éléments du formulaire
	for (var index = firstElement; index < lastElement; index++) {
		frmElement = oForm.elements[index];
		// core
		if (frmElement.id === "combobox4") {
			var dropUpdate = document.getElementsByClassName('ms-drop')[1].children[0];
			var  lenOpt = dropUpdate.childElementCount-1;
			for(var opt = 0; opt <= lenOpt; ++opt) {
				var node = dropUpdate.childNodes[opt];
				var nodeText = node.textContent;
				node.lastChild.childNodes[0].checked = false;
				if (nodeText === tab[tabindex]) {
					node.lastChild.childNodes[0].checked = true;
					frmElement.childNodes[opt+1].selected = true;
					var valueUpdate = document.getElementsByClassName('ms-choice')[1].children[0];
					valueUpdate.innerHTML = nodeText;	
				}
			}	
		}
		else {
			frmElement.value = tab[tabindex];
		}
		tabindex++;
	}
}

// ######################################################

function refreshSerialNumberForm(oForm, firstElement, id, list) { 

	updateAnimation();
	
	var tab = list.split("|#|");
	
	var lastElement = tab.length + firstElement + 1;
	
	var tabindex = 0;

	oForm.elements[2].value = id;
	// On parcourt les éléments du formulaire
	for (var index = firstElement; index <= lastElement; index++) {
		frmElement = oForm.elements[index];
		
		if ((frmElement.id === "update-placeholder-top") || (frmElement.id === "update-placeholder-other")) {
			if ((tab[tabindex] !== "") && (isNaN(tab[tabindex]))) {
				frmElement.placeholder = tab[tabindex];
			}
			else {
				frmElement.placeholder = "JPG file";
			}
		}
		else if ((frmElement.id === "update-file-top") || (frmElement.id === "update-file-other")) {
			tabindex--;
		}
		else if (frmElement.nodeName === "SELECT") {
			
			var list = dropUpdate = document.getElementsByClassName('ms-drop');
			// socket
			if (frmElement.id === "combobox2") {
			
				var listSocket = tab[tabindex].replace(/,\s/g,',');
				var tabsocket = listSocket.split(",");
				var lenSocket = tabsocket.length;
				
				var dropUpdate = document.getElementsByClassName('ms-drop')[6].children[0];
				var lenOpt = dropUpdate.childElementCount-2;
				var value = "";
				
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (opt === 0) {
						if (lenSocket === lenOpt) {
							node.lastChild.childNodes[0].checked = true;
							value = "All selected";
						}
					}
					for (var socket = 0; socket < lenSocket; ++socket) {
						if (nodeText === tabsocket[socket]) {
							node.lastChild.childNodes[0].checked = true;
							frmElement.childNodes[opt].selected = true;
							if (value !== "All selected") {
								if (value === "")  {
									value = nodeText;
								}
								else {
									value = value+ ', '+nodeText;
								}
							}
						}
					}
				}			
				var valueUpdate = document.getElementsByClassName('ms-choice')[6].children[0];
				valueUpdate.innerHTML = value;
			}
			// package
			else if (frmElement.id === "combobox4") {
				var dropUpdate = document.getElementsByClassName('ms-drop')[4].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
						
						frmElement.childNodes[2*opt+1].selected = true;
						
						var valueUpdate = document.getElementsByClassName('ms-choice')[4].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
			// microprocessor
			else if (frmElement.id === "combobox6") {
				var dropUpdate = document.getElementsByClassName('ms-drop')[5].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
						frmElement.childNodes[opt+1].selected = true;
						var valueUpdate = document.getElementsByClassName('ms-choice')[5].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
			// tested
			else if (frmElement.id === "combobox8") {
				var dropUpdate = document.getElementsByClassName('ms-drop')[7].children[0];
				var  lenOpt = dropUpdate.childElementCount-2;
				for(var opt = 0; opt <= lenOpt; ++opt) {
					var node = dropUpdate.childNodes[opt];
					var nodeText = node.textContent;
					node.lastChild.childNodes[0].checked = false;
					if (nodeText === tab[tabindex]) {
						node.lastChild.childNodes[0].checked = true;
						
						frmElement.childNodes[2*opt+1].selected = true;
						
						var valueUpdate = document.getElementsByClassName('ms-choice')[7].children[0];
						valueUpdate.innerHTML = nodeText;	
					}
				}	
			}
		}
		else {
			frmElement.value = tab[tabindex];
		}
		tabindex++;
	}
}

// ######################################################

function submitSerialNumberForm(oForm, type, name, file, maxSize, ext) {
	var submit = 1;
	var error = document.getElementsByClassName('messages error')[0].innerHTML;
	var reg = new RegExp("<p>.*</p>","g");
	trimmedName = oForm.elements[name].value.trim();
	
	if (document.getElementById(file).files.length !== 0) {
		var uploadedFile = document.getElementById(file);
		var fileSize = uploadedFile.files[0].size;
		var fileExt = uploadedFile.files[0].type;
		fileExt = fileExt.split("/");
		fileExt = fileExt[1];
	}
	else {
		fileSize = 0;
		fileExt = ext;
	}
	// bug mime firefox pdf
	if ((fileExt === "octet-stream") && (ext === 'pdf')) {
		fileExt = ext;
	}
	if (trimmedName === "") {
		submit = 0;
		error = error.replace(reg,"<p>FPO Number is empty!</p>");
	}
	else if (fileSize > maxSize) {
		submit = 0;
		error = error.replace(reg,"<p>Top Picture file size ("+(fileSize/1024/1024).toFixed(2)+" Mo) exceeds the allowable limit ("+(maxSize/1024/1024).toFixed(2)+" Mo)!</p>");
	}
	else if (fileExt !== ext) {
		submit = 0;
		error = error.replace(reg,"<p>Top Picture file does not match the ."+ext+" file extension!</p>");
	}
	// Submit si OK
	if (submit === 1) {
		document.getElementById(oForm.submit());
	}
	else {
		document.getElementsByClassName('messages error')[0].innerHTML = error;
		if (type ==='create'){
			$('.messages').hide();
			$('#create').hide();
			$("#index").fadeTo( 0 , 0);
			$('.messages.error').effect("shake",50);
			$('#create').show("slide", 600);
		}
		else if (type ==='update'){
			$('.messages').hide();
			$('#update').hide();
			$("#index").fadeTo( 0 , 0);
			$('.messages.error').effect("shake",50);
			$('#update').show("slide", 600);
		}
		$("#index").fadeTo( "slow" , 1, function() {
			resizeNav("parent","nav","footer"); 
		});
	}
}

// ######################################################

function updateAnimation() {
	$('.messages').hide();
	$('#create').hide(); 
	$('#update').hide();
	$("#index").fadeTo( 0 , 0);
	$('.messages.info').effect("highlight",1000);
	$('#update').show("fold", 300);
	$("#index").fadeTo( "slow" , 1, function() {
			resizeNav("parent","nav","footer"); 
	});	
}

function upload(id) {
	document.getElementById(id).click();
}

function clean(updateOForm, id, idPh, text, file) {
	var uploadedFile = document.getElementById(id);
	uploadedFile.value = "";
	if ( document.forms[updateOForm].elements[1].value !== "") {
		document.forms[updateOForm].elements[1].value = 'all';
	}
	else {
		document.forms[updateOForm].elements[1].value = file;
	}
	document.getElementById(idPh).placeholder = text;
}

function refreshPlaceholder(idSrc, idDest) {
	var name = document.getElementById(idSrc).value;
	name =name.replace("C:\\fakepath\\", "");
	document.getElementById(idDest).placeholder = name;
}