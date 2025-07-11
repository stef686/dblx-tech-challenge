import type { LucideIcon } from 'lucide-vue-next';
import type { PageProps } from '@inertiajs/core';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface ItemData {
    id: number;
    name: string;
    description?: string;
    image_url?: string;
    content_type?: string;
    type_icon?: string;
    content: ContentData[];
}

export interface ContentData {
    id: number;
    header?: string;
    content?: string;
    url?: string;
    button_text?: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
