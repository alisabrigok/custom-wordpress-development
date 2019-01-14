var MERCHANTS_API = 'https://www.stcpay.com.sa/challenge/merchants';

var $languageContainer = $('#language-container');
var $contentContainer = $('#content-container');

var isRtlEnabled = localStorage.getItem('isRTL') && window.location.href.split('/').includes('ar');

if (isRtlEnabled) {
  $contentContainer.addClass('rtl');
  translateContent();
}

$languageContainer.on('click', function() {
  if (isRtlEnabled) {
    localStorage.setItem('isRTL', '');
    window.location.replace("http://localhost:8888/stcpay/");
  } else {
    localStorage.setItem('isRTL', 'true');
    window.location.replace("http://localhost:8888/stcpay/ar");
  }
});

var $map = $('#map');

if ($map) {
  var map = new GMaps({
    div: '#map',
    lat: 24.759324,
    lng: 46.738326,
    zoom: 13
  });
  
  function updateMerchantPins(merchantsData) {
    $.post(MERCHANTS_API, merchantsData, function(response) {
      merchants = (response.items || []).forEach(merchant => {
        map.addMarker({
          lat: merchant.address.latitude || '',
          lng: merchant.address.longitude || '',
          icon: {
            url: merchant.category.imageUrlPin || '',
            scaledSize: new google.maps.Size(34, 46)
          },
          infoWindow: {
            content: 
            `
              <div class="info__container">
                <img src="${merchant.imageUrl || ''}" alt="merchant logo" class="info__logo"/>
                <p class="info__title">${merchant.brandName}</p>
                <p class="info__description">${merchant.category.desc}</p>
              </div>
            `
          }
        });
      });
    }, 'json');
  }
  
  updateMerchantPins({
    nearLatitude: 24.759324,
    nearLongitude: 46.738326,
    nearDistance: 1,
    limit: 100
  });
}

function translateContent() {
  $('#language-switcher').text('English');
  $('#merchants-title').text('مواقع التجار');
  $('#filter-text').text('تصفية');
  $('#form-title').text('تسجيل التجار');
  $('#form-desc').text('أخبرنا عن الماركات التي ترغب انت تجدها على STC PAY NETWORK');
  $('#copyright-text').text('© 2019 المدفوعات الرقمية السعودية. جميع الحقوق محفوظة');
  $('#social-title').text('تابعنا');
  $('#app-title').text('حمل التطبيق');
  $('#form-ltr').hide();
  $('#form-rtl').show();
}
