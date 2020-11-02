var openFile = function(event, element) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
        const dataURL = reader.result;
        const output = document.querySelector(element);
        output.src = dataURL;
    }
    reader.readAsDataURL(input.files[0])
}

// https://docs.rajaapi.com/
var getProvinsi = () => 'https://x.rajaapi.com/MeP7c5ne5ZZHvtG7IvXmVDSCLTB73gd1XwqFjaWUiiTZrz1exj8pLIbFFm/m/wilayah/provinsi';
var getKabupaten = provinsi_id => `https://x.rajaapi.com/MeP7c5ne5ZZHvtG7IvXmVDSCLTB73gd1XwqFjaWUiiTZrz1exj8pLIbFFm/m/wilayah/kabupaten?idpropinsi=${provinsi_id}`;
var getKecamatan = kabupaten_id => `https://x.rajaapi.com/MeP7c5ne5ZZHvtG7IvXmVDSCLTB73gd1XwqFjaWUiiTZrz1exj8pLIbFFm/m/wilayah/kecamatan?idkabupaten=${kabupaten_id}`;
var getKelurahan = kecamatan_id => `https://x.rajaapi.com/MeP7c5ne5ZZHvtG7IvXmVDSCLTB73gd1XwqFjaWUiiTZrz1exj8pLIbFFm/m/wilayah/kelurahan?idkecamatan=${kecamatan_id}`;



// Jquery Handle
$(function() {
    $('.input-group.input-group-password .input-group-append').on('click', function(e) {
        if($(this).prev().prop('type') === 'password') {
            $(this).prev().prop('type', 'text')
        } else {
            $(this).prev().prop('type', 'password')
        }
        e.preventDefault()
    })
})