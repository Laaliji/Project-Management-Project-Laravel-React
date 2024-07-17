import { Link } from "@inertiajs/react";

export default function Pagination({ links }) {
    if (!links) return null;
    
    return (
        <nav className="text-center mt-4">
            {links.map((link, index) => (
                <Link key={index} href={link.url} dangerouslySetInnerHTML={{__html: link.label}} className={`${link.active ? 'font-bold' : ''} mx-1`}></Link>
            ))}
        </nav>
    );
}
