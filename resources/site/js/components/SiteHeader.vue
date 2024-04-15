<template>
    <div class="container my-5 top">
    <div class="row">
        <div class="col-12 col-xl-3 ps-xl-0">
            <div class="name bg-white text-center p-3">
                <h1><span class="sky first-name">Volodymyr</span><br><span class="yellow last-name">Buynov</span></h1>
                <span class="green">{{ profile.position }}</span>
            </div>
        </div>
        <div class="col-12 col-xl-9">
            <div class="row h-100 align-items-center text-center">
                <div class="col-12 col-xl-3 my-3">
                    <div class="card rounded-0 border-success">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-geo-alt"></i> Location:</h5>
                            <h6 class="card-subtitle text-muted">{{ profile.location }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 my-3">
                    <div class="card rounded-0 border-info">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-envelope-open"></i> Email:</h5>
                            <h6 class="card-subtitle text-muted"><a href="#contact">Send me a message</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 my-3">
                    <div class="card rounded-0 border-warning">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-skype"></i> Skype:</h5>
                            <h6 class="card-subtitle text-muted">
                                <a :href="'Skype:' + profile.skype + '?chat'" target="_blank"
                                    rel="noopener noreferrer">{{ profile.skype }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 my-3">
                    <div class="card rounded-0 border-primary">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-telegram"></i> Telegram:</h5>
                            <h6 class="card-subtitle text-muted">
                                <a :href="'https://t.me/' + profile.telegram" target="_blank" rel="noopener noreferrer">@{{ profile.telegram }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
export default {
  name: "SiteHeader",
  setup() {
    const store = useStore();
    store.dispatch("getProfile");

    const profile = computed(() => {
      return store.getters.profile;
    });

    return {
      profile,
    };
  },
  mounted() {
  },
  computed: {
  },
};
</script>
