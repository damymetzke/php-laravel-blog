const META_TAGS = document.getElementsByTagName('meta');
let metaData: {[name: string]: string} | undefined = undefined


export default function getMetaData(key: string): string
{
    if(metaData === undefined)
    {
        metaData = {};
        Array.from(META_TAGS).forEach(tag=>{
            (<{[name: string]: string}>metaData)[tag.name] = tag.content;
        });
    }

    return (key in metaData) ? metaData[key] : "";
}