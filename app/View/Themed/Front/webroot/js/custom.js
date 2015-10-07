function fadeElem(currElem,nextElem){
  currElem.removeClass('current').find('img') .css({'z-index':'50'}) .end() .find('p') .css({'z-index':'50'});
  nextElem.addClass('current').find('img') .css({'opacity': '0','z-index':'0'}) .animate({opacity: 1}, 700, function(){
   currElem.find('img') .css({'z-index': '0'});
  }).end().find('p') .css({'height':'0','z-index':'100'}) .animate({height: 50},1000, function(){
   currElem.find('p') .css({'z-index': '0'});
  });
}

function widegetStatus(slides){
  slides.each(function(index){
   if($(this).attr('class') == 'current')
    $('#controlNav a').removeClass('active') .eq(index) .addClass('active');
  });
}
function slideshow(prev){
  var slides = $('#slideshow li');
  var currElem = slides.filter('.current');
  var lastElem = slides.filter(':last');
  var firstElem = slides.filter(':first');
  // Xác định phần tử kế tiếp là prev hay next
  var nextElem = (prev)? currElem.prev() : currElem.next();
  if(prev){
   if(firstElem.attr('class') == 'current') nextElem = lastElem;
  }else if(lastElem.attr('class') == 'current')nextElem = firstElem;
  fadeElem(currElem,nextElem);
  widegetStatus(slides);
}
function wideget(index){
  var slides = $('#slideshow li');
  var currElem = slides.filter('.current');
  var nextElem = slides.eq(index);
  fadeElem(currElem,nextElem);
  widegetStatus(slides);
}
function vk_slideshow(time){
  var idset =setInterval('slideshow()', time);
  var liarr =$('#slideshow ul li');
  var controlNav =$('#controlNav');
  var str='';
  for(var i=0; i<liarr.length; i++){
   str+='<a></a>';
  }
  controlNav.append(str);
  controlNav.children().each(function(index){
   $(this).click(function(){
    wideget(index);clearInterval(idset);
    idset =setInterval('slideshow()', time);
   });
  }).eq(0).addClass('active');
  $('#next').click(function(){
   slideshow(); clearInterval(idset);
   idset =setInterval('slideshow()', time);
  });
  $('#prev').click(function(){
   slideshow(true); clearInterval(idset);
   idset =setInterval('slideshow()', time);
  });
}
$(document).ready(function(){
  vk_slideshow(6000);
  $("body img").addClass("imagesizeauto");
});

function update_state_field(type, country_code, state_id){
  var states = {"GB":{"states":{"63":"Bedfordshire","64":"Berkshire","65":"Bristol, City of","66":"Buckinghamshire","67":"Cambridgeshire","68":"Cheshire","69":"Cornwall","70":"Co Durham","71":"Cumbria","72":"Derbyshire","73":"Devon","74":"Dorset","75":"East Riding of Yorkshire","76":"East Sussex","77":"Essex","78":"Gloucestershire","79":"Greater London","80":"Greater Manchester","81":"Hampshire","82":"Herefordshire","83":"Hertfordshire","84":"Isle of Wight","85":"Kent","86":"Lancashire","87":"Leicestershire","88":"Lincolnshire","89":"London, City of","90":"Merseyside","91":"Norfolk","92":"North Yorkshire","93":"Northamptonshire","94":"Northumberland","95":"Nottinghamshire","96":"Oxfordshire","97":"Rutland","98":"Shropshire","99":"Somerset","100":"South Yorkshire","101":"Staffordshire","102":"Suffolk","103":"Surrey","104":"Tyne and Wear","105":"Warwickshire","106":"West Midlands","107":"West Sussex","108":"West Yorkshire","109":"Wiltshire","110":"Worcestershire","111":"Clwyd","112":"Dyfed","113":"Gwent","114":"Gwynedd","115":"Mid Glamorgan","116":"Powys","117":"South Glamorgan","118":"West Glamorgan","119":"Co Fermanagh","120":"Co Tyrone","121":"Co Londonderry","122":"Co Antrim","123":"Co Down","124":"Co Armagh","125":"Aberdeen City","126":"Aberdeenshire","127":"Angus","128":"Argyll and Bute","129":"Clackmannanshire","130":"Dumfries and Galloway","131":"Dundee City","132":"East Ayrshire","133":"East Dunbartonshire","134":"East Lothian","135":"East Renfrewshire","136":"City of Edinburgh","137":"Falkirk","138":"Fife","139":"Glasgow City","140":"Highland","141":"Inverclyde","142":"Midlothian","143":"Moray","144":"North Ayrshire","145":"North Lanarkshire","146":"Perth and Kinross","147":"Renfrewshire","148":"Scottish Borders","149":"South Ayrshire","150":"South Lanarkshire","151":"Stirling","152":"West Dunbartonshire","153":"West Lothian","154":"Na h-Eileanan Siar","155":"Orkney Islands","156":"Shetland Island","157":"Kh\u00e1c"}},"US":{"states":{"1":"Alabama","2":"American Samoa","3":"Arizona","4":"Arkansas","5":"Armed Forces Ame","6":"Armed Forces Eur","7":"Armed Forces Pac","8":"California","9":"Colorado","10":"Connecticut","11":"Delaware","12":"Federated States","13":"Florida","14":"Georgia","15":"Guam","16":"Hawaii","17":"Idaho","18":"Illinois","19":"Indiana","20":"Iowa","21":"Kansas","22":"Kentucky","23":"Louisiana","24":"Maine","25":"Marshall Islands","26":"Maryland","27":"Massachusetts","28":"Michigan","29":"Minnesota","30":"Mississippi","31":"Missouri","32":"Montana","33":"Nebraska","34":"Nevada","35":"New Hampshire","36":"New Jersey","37":"New Mexico","38":"New York","39":"North Carolina","40":"North Dakota","41":"Northern Mariana","42":"Ohio","43":"Oklahoma","44":"Oregon","45":"Palau","46":"Pennsylvania","47":"Puerto Rico","48":"Rhode Island","49":"South Carolina","50":"South Dakota","51":"Tennessee","52":"Texas","53":"Utah","54":"Vermont","55":"Virgin Islands","56":"Virginia","57":"Washington","58":"Washington DC","59":"West Virginia","60":"Wisconsin","61":"Wyoming","62":"Other"}},"VN":{"states":{"158":"H\u00e0 N\u1ed9i","159":"TP-H\u1ed3 Ch\u00ed Minh","160":"\u0110\u00e0 N\u1eb5ng","161":"An Giang","162":"B\u00e0 R\u1ecba - V\u0169ng T\u00e0u","163":"B\u1ea1c Li\u00eau","164":"B\u1eafc K\u1ea1n","165":"B\u1eafc Giang","166":"B\u1eafc Ninh","167":"B\u1ebfn Tre","168":"B\u00ecnh D\u01b0\u01a1ng","169":"B\u00ecnh \u0110\u1ecbnh","170":"B\u00ecnh Ph\u01b0\u1edbc","171":"B\u00ecnh Thu\u1eadn","172":"C\u00e0 Mau","173":"Cao B\u1eb1ng","174":"C\u1ea7n Th\u01a1 (TP)","176":"\u0110\u1eafk L\u1eafk","177":"\u0110\u1eafk N\u00f4ng","178":"\u0110i\u1ec7n Bi\u00ean","179":"\u0110\u1ed3ng Nai","180":"\u0110\u1ed3ng Th\u00e1p","181":"Gia Lai","182":"H\u00e0 Giang","183":"H\u00e0 Nam","184":"H\u00e0 T\u1ec9nh","185":"H\u1ea3i D\u01b0\u01a1ng","186":"H\u1ea3i Ph\u00f2ng (TP)","187":"H\u00f2a B\u00ecnh","188":"H\u1eadu Giang","189":"H\u01b0ng Y\u00ean","190":"Kh\u00e1nh H\u00f2a","191":"Ki\u00ean Giang","192":"Kon Tum","193":"Lai Ch\u00e2u","194":"L\u00e0o Cai","195":"L\u1ea1ng S\u01a1n","196":"L\u00e2m \u0110\u1ed3ng","197":"Long An","198":"Nam \u0110\u1ecbnh","199":"Ngh\u1ec7 An","200":"Ninh B\u00ecnh","201":"Ninh Thu\u1eadn","202":"Ph\u00fa Th\u1ecd","203":"Ph\u00fa Y\u00ean","204":"Qu\u1ea3ng B\u00ecnh","205":"Qu\u1ea3ng Nam","206":"Qu\u1ea3ng Ng\u00e3i","207":"Qu\u1ea3ng Ninh","208":"Qu\u1ea3ng Tr\u1ecb","209":"S\u00f3c Tr\u0103ng","210":"S\u01a1n La","211":"T\u00e2y Ninh","212":"Th\u00e1i Nguy\u00ean","213":"Thanh H\u00f3a","214":"Th\u1eeba Thi\u00ean - Hu\u1ebf","215":"Ti\u00eang Giang","216":"Tr\u00e0 Vinh","217":"Tuy\u00ean Quang","218":"V\u0129nh Long","219":"V\u0129nh Ph\u00fac","220":"Y\u00ean B\u00e1i"}}};
  var country = states[country_code];
  if (type == "customer") {
    var state_select = $("select[name=state_id]");
    var state_input = $("input[name=state_name]");
    var state_type = $("input[name=state_type]");
  }else if (type == "delivery") {
    var state_select = $("select[name='delivery_data[state_id]']");
    var state_input = $("input[name='delivery_data[state_name]']");
    var state_type = $("input[name='delivery_data[state_type]']");
  }
  state_select.empty();
  
  if (country && country.states) {
    state_select.show();
    state_input.hide();
    state_type.val("1");
    option_entries = new Array();
    $.each(country.states, function(i){
      option_entries.push('<option value="' + i + '">' + this + '</option>');
    });
    state_select.append(option_entries.join(""));
    if (arguments.length > 1){
      state_select.val(state_id);
    }
  } 
  else{
    state_select.hide();
    state_input.show();
    state_type.val("2");
  }
}
$(function(){
  update_state_field('customer', 'VN', '160');
})
$(function(){
  update_state_field('delivery', 'VN', '');
})