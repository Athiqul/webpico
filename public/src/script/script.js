const seoMenu = document.getElementById('seoMenu');
const marketingMenu = document.getElementById('marketingMenu');
const mobileMenu = document.getElementById('mobileMenu');
const mobileSeo = document.getElementById('mobileSeo');
const mobileMarketing = document.getElementById('mobileMarketing');
const mobileService = document.getElementById('mobileService');
const modal = document.getElementById('modal');
const modalOutsiders = document.getElementById('modalOutsiders');
const confirmModal = document.getElementById('confirmModal');
function seoToggle() {
    const classList = seoMenu.classList;
    if (classList.contains('hidden')) {
        classList.remove('hidden');
        marketingMenu.classList.add('hidden');
    } else {
        classList.add('hidden');
    }
}

function marketingToggle() {
    const classList = marketingMenu.classList;
    if (classList.contains('hidden')) {
        classList.remove('hidden');
        seoMenu.classList.add('hidden');
    } else {
        classList.add('hidden');
    }
}

function menuHandler() {
    const isVisible = mobileMenu.classList.contains('hidden');
    console.log(isVisible);
    if (isVisible) {
        mobileMenu.classList.remove('hidden');
    } else {
        mobileMenu.classList.add('hidden');
        mobileSeo.classList.add('hidden');
        mobileMarketing.classList.add('hidden');
        mobileService.classList.add('hidden');

    }
}
document.getElementById('menuOutSide').addEventListener('click', menuHandler);

function handleMobileSeo() {
    if (mobileSeo.classList.contains('hidden')) {
        mobileSeo.classList.remove('hidden');
    } else {
        mobileSeo.classList.add('hidden');
    }
}
function handleMobileMarketing() {
    if (mobileMarketing.classList.contains('hidden')) {
        mobileMarketing.classList.remove('hidden');
    } else {
        mobileMarketing.classList.add('hidden');
    }
}
function handleService(){
    if(mobileService.classList.contains('hidden')){
        mobileService.classList.remove('hidden');
    }else{
        mobileService.classList.add('hidden');
    }
}

// Scroll to the top
function scrollToTop(){
window.scrollTo({top: 0, behavior: 'smooth'});
}

// modal Handler
function handleModal(){
    if(modal.classList.contains('hidden')){
        modal.classList.remove('hidden');
    }else{
        modal.classList.add('hidden');
    }
}
modalOutsiders.addEventListener('click', function(e){
    if(e.target.id ==='modalOutsiders'){
        handleModal();
    }
})

function confirmHandler(e){
    e.preventDefault();
    if(confirmModal.classList.contains('hidden')){
        confirmModal.classList.remove('hidden');
    }else{
        confirmModal.classList.add('hidden');
    }
}

confirmModal.addEventListener('click', function(e){
    if(e.target.id ==='modalOutsiders'){
        handleModal();
    }
})
// document.addEventListener('click',(e) => {
//     console.log('clicked')
//     seoMenu.classList.add('hidden');
//     marketingMenu.classList.add('hidden');
//     if(e.target.id !=='seoMenu' || e.target.id !=='marketingMenu'){
//         console.log('fired')
//     }
// })
