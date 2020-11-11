export {};

import getMetaData from './shared/get-meta-data.ts';

const LAYOUT_LOGOUT = document.getElementById('layout-logout');

const LAYOUT_URL = '/admin/logout';

if(LAYOUT_LOGOUT !== null)
{
    LAYOUT_LOGOUT.addEventListener('click', ()=>{
        const request = new XMLHttpRequest();

        request.onreadystatechange = (): void => {
            if (request.readyState == 4 && request.status == 200) {
                Array.from(document.getElementsByTagName('body')).forEach(element => {
                    element.setAttribute('active-role', 'guest');
                });
            }
        };

        
        request.open("POST", LAYOUT_URL, true);

        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('X-CSRF-TOKEN', getMetaData('csrf-token'));

        request.send();
    })
}