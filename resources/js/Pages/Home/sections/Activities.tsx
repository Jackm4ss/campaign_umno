import type { EventData, ArticleData, LeaderData } from '../../../types';

interface Props {
    events: EventData[];
    articles: ArticleData[];
    leaders: LeaderData[];
}

export default function Activities({ events, articles, leaders }: Props) {
    return (
        <section id="aktiviti" className="py-24 bg-gray-50">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {leaders.length > 0 ? (
                    <div className="mb-16">
                        <div className="text-center mb-10">
                            <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Barisan</p>
                            <h2 className="font-['Bebas_Neue'] text-4xl text-[#1A1A2E]">PIMPINAN</h2>
                        </div>
                        <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
                            {leaders.map((leader) => (
                                <div key={leader.id} className="text-center">
                                    <div className="w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                                        <img src={leader.image_url} alt={leader.name} className="w-full h-full object-cover" loading="lazy" />
                                    </div>
                                    <h3 className="font-bold text-sm text-[#1A1A2E]">{leader.name}</h3>
                                    <p className="text-xs text-gray-500 mt-1">{leader.position}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                ) : null}

                {articles.length > 0 ? (
                    <div>
                        <div className="text-center mb-10">
                            <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Berita</p>
                            <h2 className="font-['Bebas_Neue'] text-4xl text-[#1A1A2E]">ARTIKEL TERKINI</h2>
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                            {articles.map((article) => (
                                <article key={article.id} className="bg-white rounded-xl overflow-hidden shadow-sm">
                                    <div className="aspect-video overflow-hidden">
                                        <img src={article.image_url} alt={article.title} className="w-full h-full object-cover" loading="lazy" />
                                    </div>
                                    <div className="p-6">
                                        <p className="text-xs text-[#CC1A1A] font-bold uppercase tracking-wider mb-2">{article.category}</p>
                                        <h3 className="font-bold text-[#1A1A2E] mb-2 line-clamp-2">{article.title}</h3>
                                        <p className="text-gray-500 text-xs">{article.date} • {article.author}</p>
                                    </div>
                                </article>
                            ))}
                        </div>
                    </div>
                ) : null}
            </div>
        </section>
    );
}
