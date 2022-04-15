<template>
  <HeaderComponent layout="single" title="Sản phẩm đang đảm nhận"  />

  <!-- App Capsule -->
  <div id="appCapsule">
    <!-- carousel full -->
    <div class="carousel-full">
      <div class="splide__track">
        <img
          src="https://kingreal.com/wp-content/uploads/2022/02/27850a5844bdb6e3efac.jpg"
          alt="alt"
          class="imaged w-100 square"
        />
      </div>
    </div>
    <!-- * carousel full -->

    <div class="section full">
      <div class="wide-block pt-2 pb-2 product-detail-header">
        <h1 class="title">KHU ĐÔ THỊ PHỐ CHỢ ĐIỆN NAM TRUNG</h1>
        <div class="text">Thị xã Điện Bàn, Quảng Nam</div>
        <div class="text-center">
          <!-- price -->
          <div class="price">
            <div class="current-price form-control mt-2">Giá: 1 tỷ - 3 tỷ</div>
          </div>
          <!-- * price -->
        </div>
      </div>
    </div>

    <div class="section full">
      <div class="section-title">Chi tiết sản phẩm</div>
      <div class="wide-block pt-2 pb-2">
        Chủ đầu tư: Công ty cổ phần đầu tư bất động sản VGroup <br />
        Diện tích: 40.000m2<br />
        Quy mô dự án: 90m2, 100m2, 110m2, 120m2, 150m2<br />
        Pháp lý: Sổ đỏ sở hữu lâu dài<br />
        Loại hình bất động sản: Khu dân cư và khu tái định cư sẽ có hơn 500 hộ
        dân sinh sống
      </div>
    </div>

    <div class="section full">
      <div class="wide-block transparent p-0">
        <ul class="nav nav-tabs lined" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              data-bs-toggle="tab"
              href="#feed"
              role="tab"
            >
              Thông Tin
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#comments"
              role="tab"
            >
              Thảo Luận
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#collaborators"
              role="tab"
            >
              Thành Viên
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              href="#histories"
              role="tab"
            >
              Cập Nhật
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
      <div class="tab-content">
        <!-- feed -->
        <div class="tab-pane fade show active" id="feed" role="tabpanel">
          <div class="section mb-2 pt-2">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Tên</label>
                <p class="form-control-static">Nguyễn Văn A</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Số Điện Thoại</label>
                <p class="form-control-static">0123456789</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Địa Chỉ</label>
                <p class="form-control-static">Nguyễn Văn A</p>
              </div>
            </div>
          </div>
          <div class="section mb-2">
            <a href="#" class="btn btn-primary btn-block">Order Now</a>
          </div>
        </div>
        <!-- * feed -->

        <!-- * comments -->
        <div class="tab-pane fade" id="comments" role="tabpanel">
          <div class="section pt-2">
            <div class="comment-block">
              <!--item -->
              <div class="item">
                <div class="avatar">
                  <img
                    src="/mobile/assets/img/sample/avatar/avatar1.jpg"
                    alt="avatar"
                    class="imaged w32 rounded"
                  />
                </div>
                <div class="in">
                  <div class="comment-header">
                    <h4 class="title">Diego Morata</h4>
                    <span class="time">just now</span>
                  </div>
                  <div class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </div>
                </div>
              </div>
              <!-- * item -->
              <!--item -->
              <div class="item">
                <div class="avatar">
                  <img
                    src="/mobile/assets/img/sample/avatar/avatar1.jpg"
                    alt="avatar"
                    class="imaged w32 rounded"
                  />
                </div>
                <div class="in">
                  <div class="comment-header">
                    <h4 class="title">Henry Itondo</h4>
                    <span class="time">05:50 PM</span>
                  </div>
                  <div class="text">
                    Sed laoreet leo eget maximus ultricies. Nunc vitae enim
                    facilisis tortor aliquet ullamcorper nec at tortor.
                  </div>
                </div>
              </div>
              <!-- * item -->
            </div>
          </div>
        </div>
        <!-- * comments -->

        <!--  histories -->
        <div class="tab-pane fade" id="collaborators" role="tabpanel">
          <ul class="listview image-listview flush">
            <CollaboratorItemElement />
            <CollaboratorItemElement />
            <CollaboratorItemElement />
            <CollaboratorItemElement />
            <CollaboratorItemElement />
            <CollaboratorItemElement />
          </ul>
        </div>
        <!-- * histories -->
        <!--  histories -->
        <div class="tab-pane fade" id="histories" role="tabpanel">
          <div class="timeline timed">
            <div class="item">
              <span class="time">11:00 AM</span>
              <div class="dot"></div>
              <div class="content">
                <h4 class="title">Call Amanda</h4>
                <div class="text">Talk about the project</div>
              </div>
            </div>

            <div class="item">
              <span class="time">04:40 PM</span>
              <div class="dot bg-warning"></div>
              <div class="content">
                <h4 class="title">Party Night</h4>
                <div class="text">
                  Get a ticket for party at tonight 9:00 PM
                </div>
              </div>
            </div>
            <div class="item">
              <span class="time">06:00 PM</span>
              <div class="dot bg-info"></div>
              <div class="content">
                <h4 class="title">New Release</h4>
                <div class="text">Export the version 2.3</div>
              </div>
            </div>
          </div>
        </div>
        <!-- * histories -->
      </div>
    </div>
    <!-- * tab content -->
  </div>
  <!-- * App Capsule -->
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import CollaboratorItemElement from "../collaborators/includes/CollaboratorItemElement.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    CollaboratorItemElement,
  },
};
</script>

<style>
</style>