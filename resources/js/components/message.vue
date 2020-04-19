<template>
    <div>
        <li class="list-group-item" :class="className"><slot></slot>
        <span id="time" class="justify-content-end">{{ time }}</span></li>
        <small class="badge float-right" :class="classBadge">{{ user }}</small>
    </div>
</template>

<script>
    export default {
        props: [
            'color',
            'user',
            'time'
        ],
        computed:{
          className(){
              return 'list-group-item-' + this.color;
          },
          classBadge(){
              return 'badge-' + this.color;
          }
        },
        mounted() {
        }
    }
</script>

<style>
    #time{
        font-size: 8px;
        color: #000;
        margin-top: 10px;
        margin-left: 10px;
    }
</style>
