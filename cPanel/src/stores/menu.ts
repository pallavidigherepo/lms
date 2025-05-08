import { type Icon } from "@/components/Base/Lucide/Lucide.vue";
import { defineStore } from "pinia";

export interface Menu {
  icon: Icon;
  title: string;
  badge?: number;
  pageName?: string;
  subMenu?: Menu[];
  ignore?: boolean;
}

export interface MenuState {
  value: Array<Menu | string>;
}

export const useMenuStore = defineStore("menu", {
  state: (): MenuState => ({
    value: [
      {
        icon: "GaugeCircle",
        pageName: "dashboard",
        title: "Dashboard",
      },
      "People",
      {
        icon: "SquareUser",
        pageName: "Users",
        title: "School Staff",
      },
      {
        icon: "UsersIcon",
        pageName: "Students",
        title: "Students",
      },
      {
        icon: "UsersIcon",
        pageName: "Parents",
        title: "Parents",
      },
      "Management",
      
      {
        icon: "Inbox",
        pageName: "Inquiries",
        title: "Inquiries",
      },
      "Academics",
      {
        icon: "BoxIcon",
        pageName: "Course-Types",
        title: "Course Types",
      },
      {
        icon: "BriefcaseIcon",
        pageName: "Courses",
        title: "Courses",
      },
      {
        icon: "ListIcon",
        pageName: "Batches",
        title: "Batches",
        
      },
      {
        icon: "ListIcon",
        pageName: "Standards",
        title: "Standards",
      },
      {
        icon: "BookIcon",
        pageName: "Subjects",
        title: "Subjects",
      },
      "Accounts",
      {
        icon: "BadgeIndianRupee",
        pageName: "Fees",
        title: "Fees",
      },
      {
        icon: "BadgeIndianRupee",
        pageName: "Fees",
        title: "Billings",
      },
      {
        icon: "BadgeIndianRupee",
        pageName: "Fees",
        title: "Invoices",
      },
      "Human Resources",
      {
        icon: "BoxIcon",
        pageName: "Attendance",
        title: "Attendance",
      },
      {
        icon: "Video",
        pageName: "meetings",
        title: "Meeting",
      },
      {
        icon: "List",
        pageName: "leave-request",
        title: "Leave Request",
      },
      {
        icon: "Calendar",
        pageName: "events",
        title: "Events",
      },
      {
        icon: "Volume2",
        pageName: "notice-board",
        title: "Notice Board",
      },
      {
        icon: "Calendar",
        pageName: "calendar",
        title: "Holidays",
      },
      {
        icon: "Flag",
        pageName: "reports",
        title: "Report",
      },
      {
        icon: "MessagesSquare",
        pageName: "calendar",
        title: "Feedbacks",
      },
      "Settings",
      {
        icon: "Banknote",
        pageName: "fee-management",
        title: "Fee",
        subMenu: [
          {
            icon: "ListIcon",
            pageName: "FeeTypes",
            title: "Fee Types",
          },
          {
            icon: "LayersIcon",
            pageName: "FeeStructures",
            title: "Fee Structure",
          },
        ],
      },
      {
        icon: "ActivityIcon",
        pageName: "SettingManagement",
        title: "Inquiry",
        subMenu: [
          {
            icon: "LayersIcon",
            pageName: "InquirySources",
            title: "Inquiry Sources",
          },
          {
            icon: "LayersIcon",
            pageName: "InquiryStatuses",
            title: "Inquiry Status",
          },
          {
            icon: "LayersIcon",
            pageName: "InquiryFollowupTypes",
            title: "Inquiry Follow-up Types",
          },
        ],
      },     
      {
        icon: "SettingsIcon",
        pageName: "Settings",
        title: "Control Panel",
      },
      "User Management",
      {
        icon: "KeyIcon",
        pageName: "auth-management",
        title: "Roles and Permissions",
        subMenu: [
          {
            icon: "SettingsIcon",
            pageName: "Roles",
            title: "Roles",
          },
          {
            icon: "KeyIcon",
            pageName: "Permissions",
            title: "Permissions",
          },
        ],
      },
      "Exams",
      {
        icon: "MessageSquare",
        pageName: "chat",
        title: "Exams",
        subMenu: [
        {
          icon: "BriefcaseIcon",
          pageName: "Questionnaire",
          title: "Questionnaire",
          subMenu: [
              {
                  icon: "DatabaseIcon",
                  pageName: "Questions",
                  title: "Questions",
              },
              {
                  icon: "ListIcon",
                  pageName: "Templates",
                  title: "Question Paper Formats",
              },
              {
                  icon: "ArchiveIcon",
                  pageName: "GeneratedQuestionPapers",
                  title: "Generated Question Papers",
              },
          ]
        },
      ],
      },
    ],
  }),
});
