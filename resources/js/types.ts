export interface SharedProps {
    auth: {
        user: {
            id: number;
            name: string;
            email: string;
        } | null;
    };
    flash: {
        message: string | null;
        error: string | null;
    };
    ziggy: {
        url: string;
        port: number | null;
        defaults: Record<string, unknown>;
        routes: Record<string, unknown>;
        location: string;
    };
}

export interface ProgramData {
    id: number;
    slug: string;
    title: string;
    short_desc: string;
    image_url: string;
    lead: string;
    sections: Section[];
    cta: CtaGroup;
}

export interface CampaignEventContentData {
    id: number;
    slug: string;
    title: string;
    date_label: string;
    place: string;
    short_desc: string;
    image_url: string;
    lead: string;
    sections: Section[];
    cta: CtaGroup;
}

export interface GalleryItemData {
    id: number;
    type: string;
    title: string;
    src: string;
    caption: string;
    category: string;
    label: string;
    url: string | null;
}

export interface Section {
    heading: string;
    paragraphs?: string[];
    bullets?: string[];
}

export interface CtaGroup {
    primary: { label: string; href: string };
    secondary: { label: string; href: string };
}

export interface HomePageProps {
    gallery: GalleryItemData[];
    programs: ProgramData[];
    campaignEvents: CampaignEventContentData[];
    settings: Record<string, unknown>;
}

export interface GalleryPageProps {
    gallery: GalleryItemData[];
    settings: Record<string, unknown>;
}

export interface ProgramShowProps {
    program: ProgramData;
    siblings: { slug: string; title: string; image_url: string }[];
    settings: Record<string, unknown>;
}

export interface EventShowProps {
    event: CampaignEventContentData;
    siblings: { slug: string; title: string; image_url: string }[];
    settings: Record<string, unknown>;
}
