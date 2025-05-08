<script setup lang="ts">
import "@/assets/css/vendors/full-calendar.css";
import FullCalendar from "@fullcalendar/vue3";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import { type CalendarOptions } from "@fullcalendar/core";
import events from "@/fakers/events";

const options: CalendarOptions = {
  plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
  droppable: true,
  headerToolbar: {
    left: "prev,next today",
    center: "title",
    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
  },
  initialDate: "2045-01-01",
  navLinks: true,
  editable: true,
  dayMaxEvents: true,
  events: [
    {
      title: events.fakeEvents()[0].title,
      start: "2045-01-01",
      end: "2045-01-05",
    },
    {
      title: events.fakeEvents()[0].title,
      start: "2045-01-11",
      end: "2045-01-15",
    },
    {
      title: events.fakeEvents()[0].title,
      start: "2045-01-17",
      end: "2045-01-21",
    },
    {
      title: events.fakeEvents()[0].title,
      start: "2045-01-23",
      end: "2045-01-26",
    },
    {
      title: events.fakeEvents()[0].title,
      start: "2045-01-31",
      end: "2045-01-34",
    },
  ],
  drop: function (info) {
    if (
      document.querySelectorAll("#checkbox-events").length &&
      (document.querySelectorAll("#checkbox-events")[0] as HTMLInputElement)
        ?.checked
    ) {
      (info.draggedEl.parentNode as HTMLElement).remove();
      if (
        document.querySelectorAll("#calendar-events")[0].children.length == 1
      ) {
        document
          .querySelectorAll("#calendar-no-events")[0]
          .classList.remove("hidden");
      }
    }
  },
};
</script>

<template>
  <div class="full-calendar">
    <FullCalendar :options="options" />
  </div>
</template>
