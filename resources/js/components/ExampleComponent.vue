<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body" v-if="images.normal_size.length>0">
            <ProductZoomer :base-images="images" :base-zoomer-options="zoomerOptions" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  mounted() {
    this.getImage();
    console.log(this.images)
  },
  data() {
    return {
      images: {
       
        normal_size: [
         
         
        ],

         thumbs: [
       
        ],
       
       
      },
      zoomerOptions: {
        zoomFactor: 4,
        pane: "pane",
        hoverDelay: 300,
        namespace: "zoomer-bottom",
        move_by_click: true,
        scroll_items: 4,
        choosed_thumb_border_color: "#ff3d00",
        scroller_position: "bottom",

        zoomer_pane_position: "left",
      },
    };
  },

  methods: {
    getImage() {
      axios
        .get("/get/image")
        .then((resp) => {
          this.images.normal_size.push(...resp.data)
          this.images.thumbs.push(...resp.data)
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
