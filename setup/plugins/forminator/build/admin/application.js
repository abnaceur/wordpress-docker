!function(t){formintorjs.define(["admin/views"],function(t){return _.extend(Forminator,t),new(Backbone.Router.extend({app:!1,data:!1,layout:!1,module_id:null,routes:{"":"run","*path":"run"},events:{},init:function(){if(!this.data)return this.app=Forminator.Data.application||!1,this.data={},!1},run:function(t){this.init(),this.module_id=t}}))})}(jQuery);