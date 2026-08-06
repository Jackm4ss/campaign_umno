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

export interface ArticleData {
    id: number;
    title: string;
    slug: string;
    author: string;
    category: string;
    status: string;
    date: string;
    image_url: string;
    body: string;
}

export interface LeaderData {
    id: number;
    name: string;
    position: string;
    image_url: string;
    bio: string;
    extra_info: string | null;
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

export interface EventData {
    id: number;
    title: string;
    category: string;
    status: string;
    description: string;
    date: string;
    venue: string;
    address: string;
    image_url: string;
    map_url: string | null;
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
    articles: ArticleData[];
    events: EventData[];
    leaders: LeaderData[];
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
    siblings: { slug: string; title: string }[];
    settings: Record<string, unknown>;
}

export interface EventShowProps {
    event: CampaignEventContentData;
    siblings: { slug: string; title: string }[];
    settings: Record<string, unknown>;
}
