
import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './App.vue';
import CreateItem from './components/CreateItem.vue';
import DisplayItem from './components/DisplayItem.vue';
import EditItem from './components/EditItem.vue';

import ProfileEdit from './components/ProfileEdit.vue';
import ProfileAvatar from './components/ProfileAvatar.vue';



const routes = [
  {
    name: 'CreateItem',
    path: '/profile/tasks/items/create',
    component: CreateItem,
    meta: {
      title: 'Новая задача'
    }
  },
  {
        name: 'DisplayItem',
        path: '/profile/tasks/',
        component: DisplayItem,
        meta: {
          title: 'Все задачи'
        }
    },
    {
          name: 'EditItem',
          path: '/profile/tasks/edit/:id',
          component: EditItem,
          meta: {
            title: 'Редактирование задачи'
          }
      },

      {
        name: 'ProfileEdit',
        path: '/profile/edit/',
        component: ProfileEdit,
        meta: {
          title: 'Личные данные'
        }
      },
      {
        name: 'ProfileAvatar',
        path: '/profile/avatar/',
        component: ProfileAvatar,
        meta: {
          title: 'Аватар'
        }
      } 

];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app2');
