import { Link } from '@inertiajs/react';
import { useMemo, useState } from 'react';
import { baseUrl } from '../../../lib/url';
import type { CampaignEventContentData } from '../../../types';

interface Props {
    events: CampaignEventContentData[];
}

const weekdays = ['Isn', 'Sel', 'Rab', 'Kha', 'Jum', 'Sab', 'Ahd'];

function parseIsoDate(value: string | null): Date | null {
    const match = value?.match(/^(\d{4})-(\d{2})-(\d{2})$/);
    if (!match) return null;

    const date = new Date(Number(match[1]), Number(match[2]) - 1, Number(match[3]));
    return Number.isNaN(date.getTime()) ? null : date;
}

function isoDate(date: Date): string {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

function monthStart(date: Date): Date {
    return new Date(date.getFullYear(), date.getMonth(), 1);
}

function addMonths(date: Date, amount: number): Date {
    return new Date(date.getFullYear(), date.getMonth() + amount, 1);
}

function monthKey(date: Date): string {
    return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
}

function monthLabel(date: Date): string {
    return new Intl.DateTimeFormat('ms-MY', { month: 'long', year: 'numeric' }).format(date);
}

function CalendarMonth({ date, events }: { date: Date; events: CampaignEventContentData[] }) {
    const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    const leadingBlanks = (new Date(date.getFullYear(), date.getMonth(), 1).getDay() + 6) % 7;
    const cells = Array.from({ length: leadingBlanks + daysInMonth }, (_, index) => index - leadingBlanks + 1);
    const eventsByDate = new Map<string, CampaignEventContentData[]>();

    events.forEach((event) => {
        if (!event.starts_at) return;
        eventsByDate.set(event.starts_at, [...(eventsByDate.get(event.starts_at) ?? []), event]);
    });

    return (
        <article className="calendar-month">
            <h3 className="calendar-month-title">{monthLabel(date)}</h3>
            <div className="calendar-weekdays" aria-hidden="true">
                {weekdays.map((weekday) => <span key={weekday}>{weekday}</span>)}
            </div>
            <div className="calendar-days">
                {cells.map((day, index) => {
                    if (day < 1) {
                        return <span className="calendar-day calendar-day--empty" key={`empty-${index}`} aria-hidden="true"></span>;
                    }

                    const currentDate = new Date(date.getFullYear(), date.getMonth(), day);
                    const dayEvents = eventsByDate.get(isoDate(currentDate)) ?? [];

                    return (
                        <div className={`calendar-day${dayEvents.length ? ' calendar-day--active' : ''}`} key={day}>
                            <span className="calendar-day-number">{day}</span>
                            {dayEvents.map((event) => (
                                <Link
                                    key={event.slug}
                                    href={baseUrl(`/acara/${event.slug}`)}
                                    className="calendar-event-link"
                                    aria-label={`${event.title}, ${event.date_label}`}
                                    title={event.title}
                                >
                                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" strokeWidth="2" aria-hidden="true">
                                        <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" />
                                    </svg>
                                    <span>{event.title}</span>
                                </Link>
                            ))}
                        </div>
                    );
                })}
            </div>
        </article>
    );
}

export default function UpcomingEvents({ events }: Props) {
    const datedEvents = useMemo(
        () => events
            .filter((event) => parseIsoDate(event.starts_at) !== null)
            .sort((a, b) => (a.starts_at ?? '').localeCompare(b.starts_at ?? '')),
        [events],
    );
    const firstEventDate = parseIsoDate(datedEvents[0]?.starts_at ?? null);
    const initialMonth = monthStart(firstEventDate ?? new Date());
    const [monthOffset, setMonthOffset] = useState(0);
    const firstMonth = addMonths(initialMonth, monthOffset);
    const secondMonth = addMonths(firstMonth, 1);
    const visibleMonthKeys = new Set([monthKey(firstMonth), monthKey(secondMonth)]);
    const visibleEvents = datedEvents.filter((event) => event.starts_at && visibleMonthKeys.has(event.starts_at.slice(0, 7)));

    return (
        <section id="aktiviti" className="acara section-pad">
            <div className="container">
                <div className="acara-header fade-up">
                    <span className="section-label">Senarai Aktiviti</span>
                    <h2 className="section-title">AKTIVITI TERKINI</h2>
                </div>

                <div className="calendar-toolbar" aria-label="Navigasi bulan aktiviti">
                    <button
                        type="button"
                        className="calendar-nav-button"
                        aria-label="Dua bulan terdahulu"
                        onClick={() => setMonthOffset((offset) => Math.max(0, offset - 2))}
                        disabled={monthOffset === 0}
                    >
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2.5" aria-hidden="true"><path d="m15 18-6-6 6-6" /></svg>
                    </button>
                    <span>{monthLabel(firstMonth)} — {monthLabel(secondMonth)}</span>
                    <button
                        type="button"
                        className="calendar-nav-button"
                        aria-label="Dua bulan seterusnya"
                        onClick={() => setMonthOffset((offset) => offset + 2)}
                    >
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2.5" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
                    </button>
                </div>

                <div className="calendar-grid">
                    <CalendarMonth date={firstMonth} events={datedEvents} />
                    <CalendarMonth date={secondMonth} events={datedEvents} />
                </div>

                {visibleEvents.length ? (
                    <div className="calendar-event-list" aria-label="Maklumat aktiviti dalam dua bulan yang dipaparkan">
                        {visibleEvents.map((event) => (
                            <Link key={event.slug} href={baseUrl(`/acara/${event.slug}`)} className="calendar-event-card">
                                <span className="calendar-event-card-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" strokeWidth="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" /></svg>
                                </span>
                                <span className="calendar-event-card-copy">
                                    <span className="calendar-event-card-date">{event.date_label} · {event.place}</span>
                                    <strong>{event.title}</strong>
                                    <span>{event.short_desc}</span>
                                </span>
                                <span className="calendar-event-card-arrow" aria-hidden="true">&rarr;</span>
                            </Link>
                        ))}
                    </div>
                ) : (
                    <p className="calendar-empty">Tiada aktiviti dijadualkan untuk dua bulan ini.</p>
                )}
            </div>
        </section>
    );
}
