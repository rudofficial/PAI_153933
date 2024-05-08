function isWhiteSpaceOrEmpty(str) { //провер чы строка знаков пустая или с пробелами
    return /^[\s\t\r\n]*$/.test(str); //^начало, \s\t\r озн допасоване довольн личбы знаков,*может появ один\несколько раз, $конец ценгу
}

function checkStringAndFocus(obj, msg, validateFunc) { //проверяет поле. obj наша введен строка, msg озн смс если поле пуст, validateFunc доп фция
    let str = obj.value; //берет значение поля и созд назву поля ошибки
    let errorFieldName = "e_" + obj.name.substr(2); //ищет элемент спэн с идентиф е
    let errorSpan = document.getElementById(errorFieldName);
    if (validateFunc) {
        console.log(validateFunc(str));
    }
    if (isWhiteSpaceOrEmpty(str)) {
        errorSpan.textContent = msg; //если поле пустое или пробелы, то ставит текст ошибки на msg и сигнализ о ошибке
        obj.focus();
        return false;
    } else if (validateFunc && !validateFunc(str)) {
        
        errorSpan.textContent = "Podaj właściwe dane!";
        obj.focus();
        return false;
    } else {
        errorSpan.textContent = "";
        return true;
    }
}

function isEmailInvalid(email) { //проаерка имейла
    let emailRegex = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9]+\.[a-zA-Z]{2,}$/; //+\.[a-zA-Z]--\.разделение мжду названием\доменом, потом конечн часть сост из мин 2 букв
    return emailRegex.test(email); //возвращ тру если неправильно
}

function toggleNazwiskoPVisibility() { //отв за видимость поля фамилия 22
    let radioKobieta = document.querySelector('input[name="f_plec"][value="f_k"]:checked');
    let nazwiskoPField = document.getElementById('NazwiskoPanienskie');
    
    if (radioKobieta) {
        showElement('NazwiskoPanienskie');
    } else {
        hideElement('NazwiskoPanienskie');
    }
}


function showElement(e) { //отвечает за видимость поля фамилии
    document.getElementById(e).style.visibility = 'visible';
    }
    function hideElement(e) {
    document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e) { //изменя цвет в зависим от их номера
    if (e) { //элемент верша
    if (i % 2 == 1) { //номер верша, если непажысты то цвет
    e.setAttribute("style", "background-color: Aqua;");
    }
    e = e.nextSibling; //переход к след вершу
    while (e && e.nodeType != 1) { //пропуск вензлы еоторые не элементы html
    e = e.nextSibling;
    }
    alterRows(++i, e);
    }
}

function nextNode(e) {
    while (e && e.nodeType != 1) {
    e = e.nextSibling;
    }
    return e;
    }
function prevNode(e) {
    while (e && e.nodeType != 1) {
    e = e.previousSibling;
    }
    return e;
}

function swapRows(b) {
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) { //считает кол-во знаков
    if (form.value.length > maxSize)
    form.value = form.value.substring(0, maxSize);
    else
    msg.innerHTML = maxSize - form.value.length;
}    

function validate(form) {
    check = true;
    if (!checkStringAndFocus(form.elements["f_imie"], "Podaj imię!")) {
        check = false;
    }
    
    if (!checkStringAndFocus(form.elements["f_nazwisko"], "Podaj nazwisko!")) {
        check = false;
    }
    
    if (!checkStringAndFocus(form.elements["f_email"], "Podaj poprawny email!", isEmailInvalid)) {
        check = false;
    }

    if (!checkStringAndFocus(form.elements["f_kod"], "Podaj kod pocztowy!")) {
        check = false;
    }
    
    if (!checkStringAndFocus(form.elements["f_ulica"], "Podaj ulicę/osiedle!")) {
        check = false;
    }
    
    if (!checkStringAndFocus(form.elements["f_miasto"], "Podaj miasto!")) {
        check = false;
    }

    return check;
}

// вызов функции для изменения цвета
let tableRows = document.getElementsByTagName("tr");

// Wywołujemy funkcję alterRows, przekazując jako parametry wartość 1 i pierwszy wiersz tabeli
alterRows(1, tableRows[0]); // первый верш это 0
