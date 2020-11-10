export {};

const LAYOUT_LOGOUT = document.getElementById('layout-logout');

const LAYOUT_URL = '/logout';

if(LAYOUT_LOGOUT !== null)
{
    const META_TAGS = document.getElementsByTagName('meta');

    let metaData: {[name: string]: string} = {}
    Array.from(META_TAGS).forEach(tag=>{
        metaData[tag.name] = tag.content;
    });

    LAYOUT_LOGOUT.addEventListener('click', ()=>{
        const request = new XMLHttpRequest();

        request.onreadystatechange = (): void => {
            if (request.readyState == 4 && request.status == 200) {
                LAYOUT_LOGOUT.outerHTML = '<a href="/login">Login</a>'
            }
        };

        
        request.open("POST", LAYOUT_URL, true);

        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('X-CSRF-TOKEN', metaData['csrf-token']);

        request.send();
    })
}