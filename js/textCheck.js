var specialChars = /["'\\/\[\]\{\};-?><=;|)(]/mgi

function textValidate(input) {
    var output = input.replace(specialChars, "");
    return output;
}